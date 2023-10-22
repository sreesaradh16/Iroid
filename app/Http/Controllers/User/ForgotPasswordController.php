<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
        return view('user.auth.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ], [
            'email.exists' => 'Email does not exist !!'
        ]);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            $request->session()->flash('password_update', 'Reset password link sent successfully');
            return redirect()->route('user.login');
        } else {
            return back()->withErrors(['error' =>  __($status),]);
        }
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('user.auth.new-password', [
            'email' => $request->email,
            'token' => $request->token
        ]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $request->session()->flash('password_update', 'Your password changed successfully');
            return redirect()->route('user.login');
        } else {
            return back()->withErrors([
                'error' => 'Something went wrong, Please try again later',
            ]);
        }
    }
}
