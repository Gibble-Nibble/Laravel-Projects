<?php

namespace Tests\Feature;

use App\Models\Tfa8Customer;
use App\Models\Tfa8User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class Tfa8WorkflowTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('migrate:fresh', [
            '--database' => 'tfa8',
            '--path' => 'database/migrations/tfa8',
            '--force' => true,
        ])->assertExitCode(0);
    }

    public function test_customer_resource_requires_tfa8_authentication_and_supports_crud(): void
    {
        $this->get(route('tfa8.home'))->assertOk();
        $this->get(route('tfa8.about'))->assertOk();
        $this->get(route('tfa8.customers.index'))
            ->assertRedirect(route('tfa8.login'));
        $this->get(route('tfa8.login'))->assertOk()->assertSee('Sign in');
        $this->get(route('tfa8.register'))->assertOk()->assertSee('Create an account');

        $this->post(route('tfa8.register.store'), [
            'username' => 'taylor',
            'full_name' => 'Taylor User',
            'email' => 'taylor@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ])->assertRedirect(route('tfa8.home'));

        $this->assertAuthenticatedAs(Tfa8User::query()->sole(), 'tfa8');
        $this->assertNotSame('secure-password', Tfa8User::query()->sole()->password);

        $this->post(route('tfa8.logout'))->assertRedirect(route('tfa8.login'));
        $this->assertGuest('tfa8');
        $this->get(route('tfa8.customers.index'))->assertRedirect(route('tfa8.login'));

        $this->post(route('tfa8.login.store'), [
            'email' => 'taylor@example.com',
            'password' => 'secure-password',
        ])->assertRedirect(route('tfa8.customers.index'));
        $this->assertAuthenticatedAs(Tfa8User::query()->sole(), 'tfa8');
        $this->get(route('tfa8.customers.index'))->assertOk();

        $this->post(route('tfa8.customers.store'), [
            'full_name' => 'Taylor Customer',
            'email' => 'customer@example.com',
            'phone' => '555-0100',
        ])->assertRedirect(route('tfa8.customers.index'));

        $customer = Tfa8Customer::query()->sole();

        $this->get(route('tfa8.customers.show', $customer))->assertOk()->assertSee('Taylor Customer');

        $this->put(route('tfa8.customers.update', $customer), [
            'full_name' => 'Taylor Updated',
            'email' => 'customer@example.com',
            'phone' => '555-0101',
        ])->assertRedirect(route('tfa8.customers.index'));

        $this->assertDatabaseHas('customers', [
            'id' => $customer->id,
            'full_name' => 'Taylor Updated',
            'phone' => '555-0101',
        ], 'tfa8');

        $this->delete(route('tfa8.customers.destroy', $customer))
            ->assertRedirect(route('tfa8.customers.index'));

        $this->assertDatabaseMissing('customers', ['id' => $customer->id], 'tfa8');
    }

    public function test_tfa8_user_accounts_and_data_remain_in_their_own_database(): void
    {
        $this->post(route('tfa8.register.store'), [
            'username' => 'owner',
            'full_name' => 'POS Owner',
            'email' => 'owner@example.com',
            'password' => 'secure-password',
            'password_confirmation' => 'secure-password',
        ])->assertRedirect(route('tfa8.home'));

        $this->post(route('tfa8.users.store'), [
            'username' => 'clerk',
            'full_name' => 'POS Clerk',
            'email' => 'clerk@example.com',
            'password' => 'another-password',
            'password_confirmation' => 'another-password',
        ])->assertRedirect(route('tfa8.users.index'));

        $user = Tfa8User::query()->where('username', 'clerk')->sole();

        $this->get(route('tfa8.users.show', $user))->assertOk()->assertSee('POS Clerk');
        $this->assertSame(2, Tfa8User::query()->count());
        $this->assertSame(0, DB::connection('sqlite')->table('users')->count());
        $this->assertTrue(Schema::connection('tfa8')->hasTable('customers'));
        $this->assertSame(0, DB::connection('sqlite')->table('customers')->count());
    }
}
