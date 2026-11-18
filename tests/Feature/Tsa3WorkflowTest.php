<?php

namespace Tests\Feature;

use App\Models\Tsa3Task;
use App\Models\Tsa3User;
use Database\Seeders\Tsa3Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class Tsa3WorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate', [
            '--database' => 'tsa3',
            '--path' => 'database/migrations/tsa3',
            '--force' => true,
        ])->assertExitCode(0);

        $this->seed(Tsa3Seeder::class);
    }

    public function test_tsa3_has_a_dedicated_database_with_the_required_seed_data(): void
    {
        $this->assertSame('tsa3', (new Tsa3Task)->getConnectionName());
        $this->assertTrue(Schema::connection('tsa3')->hasTable('tasks'));
        $this->assertTrue(Schema::connection('tsa3')->hasTable('users'));
        $this->assertFalse(Schema::connection('sqlite')->hasTable('tasks'));
        $this->assertSame(0, DB::connection('sqlite')->table('users')->count());
        $this->assertSame(8, Tsa3Task::query()->count());
        $this->assertSame(1, Tsa3User::query()->count());
        $this->assertSame(3, Tsa3Task::query()->distinct()->count('task_date'));
        $this->assertTrue(
            Tsa3Task::query()
                ->where('title', 'Review project requirements')
                ->whereDate('task_date', today())
                ->exists(),
        );
    }

    public function test_welcome_page_shows_only_tasks_for_today(): void
    {
        $response = $this->get(route('tsa3.home'));

        $response->assertOk()
            ->assertSee('Review project requirements')
            ->assertDontSee('Read the Laravel documentation')
            ->assertDontSee('Write feature tests');
    }

    public function test_task_list_displays_every_task_in_date_order(): void
    {
        $titlesInDateOrder = Tsa3Task::query()
            ->orderBy('task_date')
            ->orderBy('id')
            ->pluck('title')
            ->all();

        $this->get(route('tsa3.tasks'))
            ->assertOk()
            ->assertSeeInOrder($titlesInDateOrder);
    }

    public function test_profile_and_about_pages_show_the_seeded_user_and_developer(): void
    {
        $this->get(route('tsa3.profile'))
            ->assertOk()
            ->assertSee('RB')
            ->assertSee('rb@example.com');

        $this->get(route('tsa3.about'))
            ->assertOk()
            ->assertSee('Developer:')
            ->assertSee('RB');
    }
}
