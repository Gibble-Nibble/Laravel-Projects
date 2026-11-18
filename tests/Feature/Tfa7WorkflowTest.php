<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Tfa7Customer;
use App\Models\Tfa7User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class Tfa7WorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_create_and_update_use_the_isolated_tfa7_table(): void
    {
        $response = $this->post(route('tfa7.customers.store'), [
            'full_name' => 'Taylor Customer',
            'email' => 'taylor@example.com',
            'phone' => '555-0100',
        ]);

        $customer = Tfa7Customer::query()->sole();

        $response->assertRedirect(route('tfa7.customers'));
        $this->assertSame(0, Customer::query()->count());

        $this->put(route('tfa7.customers.update', $customer), [
            'full_name' => 'Taylor Updated',
            'email' => 'taylor@example.com',
            'phone' => '555-0101',
        ])->assertRedirect(route('tfa7.customers'));

        $this->assertDatabaseHas('tfa7_customers', [
            'id' => $customer->id,
            'full_name' => 'Taylor Updated',
            'phone' => '555-0101',
        ]);
    }

    public function test_user_avatar_upload_is_stored_as_a_320_pixel_jpeg(): void
    {
        Storage::fake('public');

        $this->post(route('tfa7.users.store'), [
            'username' => 'taylor',
            'full_name' => 'Taylor User',
            'email' => 'taylor.user@example.com',
            'avatar' => UploadedFile::fake()->image('avatar.png', 640, 480),
        ])->assertRedirect(route('tfa7.users'));

        $user = Tfa7User::query()->sole();
        $storedImage = Storage::disk('public')->path($user->avatar);
        $dimensions = getimagesize($storedImage);

        Storage::disk('public')->assertExists($user->avatar);
        $this->assertSame('jpg', pathinfo($user->avatar, PATHINFO_EXTENSION));
        $this->assertSame([320, 320], [$dimensions[0], $dimensions[1]]);

        $avatarPath = $user->avatar;

        $this->put(route('tfa7.users.update', $user), [
            'username' => 'taylor',
            'full_name' => 'Taylor Updated',
            'email' => 'taylor.user@example.com',
        ])->assertRedirect(route('tfa7.users'));

        $this->assertSame($avatarPath, $user->fresh()->avatar);
        Storage::disk('public')->assertExists($avatarPath);
    }

    public function test_tfa7_pages_render_with_migrated_tables(): void
    {
        $this->get(route('tfa7.home'))->assertOk();
        $this->get(route('tfa7.about'))->assertOk();
        $this->get(route('tfa7.customers'))->assertOk();
        $this->get(route('tfa7.customers.create'))->assertOk();
        $this->get(route('tfa7.users'))->assertOk();
        $this->get(route('tfa7.users.create'))->assertOk();
    }
}
