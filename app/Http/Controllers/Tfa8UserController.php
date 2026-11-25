<?php

namespace App\Http\Controllers;

use App\Models\Tfa8User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use RuntimeException;

class Tfa8UserController extends Controller
{
    public function index(): View
    {
        return view('tfa8.users.index', [
            'users' => Tfa8User::query()->orderBy('full_name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('tfa8.users.form', ['user' => new Tfa8User]);
    }

    public function store(Request $request): RedirectResponse
    {
        $user = new Tfa8User;
        $this->saveUser($request, $user);

        return redirect()->route('tfa8.users.index')
            ->with('success', "User {$user->full_name} was created.");
    }

    public function show(Tfa8User $user): View
    {
        return view('tfa8.users.show', compact('user'));
    }

    public function edit(Tfa8User $user): View
    {
        return view('tfa8.users.form', compact('user'));
    }

    public function update(Request $request, Tfa8User $user): RedirectResponse
    {
        $this->saveUser($request, $user);

        return redirect()->route('tfa8.users.index')
            ->with('success', "User {$user->full_name} was updated.");
    }

    public function destroy(Tfa8User $user): RedirectResponse
    {
        if ($user->is(auth('tfa8')->user())) {
            return back()->withErrors(['user' => 'You cannot delete the account you are signed in with.']);
        }

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('tfa8.users.index')->with('success', 'User was deleted.');
    }

    private function saveUser(Request $request, Tfa8User $user): void
    {
        $usernameRule = 'required|string|max:60|unique:tfa8.users,username';
        $emailRule = 'required|email|max:255|unique:tfa8.users,email';

        if ($user->exists) {
            $usernameRule .= ','.$user->id;
            $emailRule .= ','.$user->id;
        }

        $data = $request->validate([
            'username' => $usernameRule,
            'full_name' => ['required', 'string', 'max:120'],
            'email' => $emailRule,
            'password' => [$user->exists ? 'nullable' : 'required', 'string', 'min:8', 'confirmed'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        if (blank($data['password'] ?? null)) {
            unset($data['password']);
        }

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
