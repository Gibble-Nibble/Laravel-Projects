<?php

namespace Tests\Feature;

use App\Mail\Tsa4TaskCompleted;
use App\Models\Tfa8User;
use App\Models\Tsa4Task;
use App\Models\Tsa4User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class Tsa4WorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh', [
            '--database' => 'tsa4',
            '--path' => 'database/migrations/tsa4',
            '--force' => true,
        ])->assertExitCode(0);

        $this->artisan('migrate:fresh', [
            '--database' => 'tfa8',
            '--path' => 'database/migrations/tfa8',
            '--force' => true,
        ])->assertExitCode(0);
    }

    public function test_public_pages_render_and_task_management_redirects_guests_to_login(): void
    {
        $this->get(route('tsa4.home'))->assertOk();
        $this->get(route('tsa4.tasks.index'))->assertOk();
        $this->get(route('tsa4.profile'))->assertOk();
        $this->get(route('tsa4.about'))->assertOk();
        $this->get(route('tsa4.login'))->assertOk()->assertSee('Sign in');
        $this->get(route('tsa4.register'))->assertOk()->assertSee('Create an account');
        $this->get(route('tsa4.tasks.create'))->assertRedirect(route('tsa4.login'));
    }

    public function test_task_crud_archives_records_and_emails_only_on_transition_to_done(): void
    {
        $this->post(route('tsa4.register.store'), [
            'username' => 'taylor',
            'full_name' => 'Taylor User',
            'email' => 'taylor@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ])->assertRedirect(route('tsa4.home'));

        $this->assertAuthenticatedAs(Tsa4User::query()->sole(), 'tsa4');
        Mail::fake();

        $this->post(route('tsa4.tasks.store'), [
            'title' => 'Finish assessment',
            'status' => 'pending',
            'task_date' => today()->toDateString(),
        ])->assertRedirect(route('tsa4.tasks.index'));

        $task = Tsa4Task::query()->sole();
        $this->get(route('tsa4.tasks.show', $task))->assertOk()->assertSee('Finish assessment');

        $completion = [
            'title' => 'Finish assessment',
            'status' => 'done',
            'task_date' => today()->toDateString(),
        ];

        $this->put(route('tsa4.tasks.update', $task), $completion)
            ->assertRedirect(route('tsa4.tasks.index'));
        $this->put(route('tsa4.tasks.update', $task), $completion)
            ->assertRedirect(route('tsa4.tasks.index'));

        Mail::assertSentTimes(Tsa4TaskCompleted::class, 1);

        $this->delete(route('tsa4.tasks.destroy', $task))
            ->assertRedirect(route('tsa4.tasks.index'));

        $this->assertTrue($task->fresh()->is_archived);
        $this->assertSame(0, Tsa4Task::query()->where('is_archived', false)->count());
    }

    public function test_tsa4_records_are_isolated_from_the_default_and_tfa8_databases(): void
    {
        $this->assertSame('tsa4', (new Tsa4Task)->getConnectionName());
        $this->assertTrue(Schema::connection('tsa4')->hasTable('tasks'));
        $this->assertFalse(Schema::connection('sqlite')->hasTable('tasks'));
        $this->assertFalse(Schema::connection('tfa8')->hasTable('tasks'));
        $this->assertSame(0, DB::connection('sqlite')->table('users')->count());
    }

    public function test_signing_out_of_one_assessment_keeps_the_other_guard_authenticated(): void
    {
        $this->post(route('tfa8.register.store'), [
            'username' => 'pos-user',
            'full_name' => 'POS User',
            'email' => 'pos@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ])->assertRedirect(route('tfa8.home'));

        $this->post(route('tsa4.register.store'), [
            'username' => 'task-user',
            'full_name' => 'Task User',
            'email' => 'task@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ])->assertRedirect(route('tsa4.home'));

        $this->assertAuthenticatedAs(Tfa8User::query()->sole(), 'tfa8');
        $this->assertAuthenticatedAs(Tsa4User::query()->sole(), 'tsa4');

        $this->post(route('tfa8.logout'))->assertRedirect(route('tfa8.login'));

        $this->assertGuest('tfa8');
        $this->assertAuthenticatedAs(Tsa4User::query()->sole(), 'tsa4');
    }
}
