<?php

namespace App\Http\Controllers;

use App\Models\Tfa7User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use RuntimeException;

class Tfa7UserController extends Controller
{
    public function index()
    {
        return view('tfa7.users', [
            'users' => Tfa7User::query()->orderBy('full_name')->get(),
        ]);
    }

    public function create()
    {
        return view('tfa7.users.form', ['user' => new Tfa7User]);
    }

    public function store(Request $request)
    {
        $user = new Tfa7User;
        $this->saveUser($request, $user);

        return redirect()->route('tfa7.users')
            ->with('success', "User {$user->full_name} was created.");
    }

    public function edit(Tfa7User $user)
    {
        return view('tfa7.users.form', compact('user'));
    }

    public function update(Request $request, Tfa7User $user)
    {
        $this->saveUser($request, $user);

        return redirect()->route('tfa7.users')
            ->with('success', "User {$user->full_name} was updated.");
    }

    private function saveUser(Request $request, Tfa7User $user): void
    {
        $usernameRule = 'required|string|max:60|unique:tfa7_users,username';
        $emailRule = 'required|email|max:255|unique:tfa7_users,email';

        if ($user->exists) {
            $usernameRule .= ','.$user->id;
            $emailRule .= ','.$user->id;
        }

        $data = $request->validate([
            'username' => $usernameRule,
            'full_name' => ['required', 'string', 'max:120'],
            'email' => $emailRule,
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        $previousAvatar = $user->avatar;

        if ($request->hasFile('avatar')) {
            $image = (new ImageManager(new Driver))
                ->read($request->file('avatar')->getPathname())
                ->cover(320, 320);

            $path = 'avatars/'.Str::uuid().'.jpg';
            if (! Storage::disk('public')->put($path, (string) $image->toJpeg(85))) {
                throw new RuntimeException('Unable to store uploaded avatar.');
            }

            $data['avatar'] = $path;
        }

        $user->fill($data)->save();

        if (isset($data['avatar']) && $previousAvatar) {
            Storage::disk('public')->delete($previousAvatar);
        }
    }
}
