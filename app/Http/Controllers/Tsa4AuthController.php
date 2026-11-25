<?php

namespace App\Http\Controllers;

use App\Models\Tsa4User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class Tsa4AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.project-login', [
            'project' => 'tsa4',
            'projectName' => 'TSA4 Tasks for Today',
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        $throttleKey = Str::transliterate('tsa4|'.Str::lower($request->input('email')).'|'.$request->ip());

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            throw ValidationException::withMessages([
                'email' => sprintf(
                    'Too many login attempts. Please try again in %d seconds.',
                    RateLimiter::availableIn($throttleKey),
                ),
            ]);
        }

        if (! Auth::guard('tsa4')->attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey, 60);

            return back()->withErrors(['email' => 'These credentials do not match our records.'])
                ->onlyInput('email');
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        return redirect()->intended(route('tsa4.home'));
    }

    public function showRegister(): View
    {
        return view('auth.project-register', [
            'project' => 'tsa4',
            'projectName' => 'TSA4 Tasks for Today',
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'max:60', 'unique:tsa4.users,username'],
            'full_name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255', 'unique:tsa4.users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Tsa4User::query()->create($data);
        Auth::guard('tsa4')->login($user);
        $request->session()->regenerate();

        return redirect()->route('tsa4.home');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('tsa4')->logout();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('tsa4.login');
    }
}
