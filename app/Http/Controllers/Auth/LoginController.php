<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $maxAttempts = 3;
    protected $decayMinutes = 5;

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_blocked) {
            auth()->logout();
            return back()->with('error', 'Akun Anda telah diblokir. Silakan hubungi admin.');
        }

        $user->login_attempts = 0;
        $user->save();
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = $this->guard()->user();
        if ($user) {
            $user->login_attempts++;
            if ($user->login_attempts >= 3) {
                $user->is_blocked = true;
            }
            $user->save();
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => [trans('auth.failed')],
            ]);
    }
}