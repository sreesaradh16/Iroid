<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest:admin')->except('logout');
    }
    protected function guard(){
        return Auth::guard('admin');
    }
    public function index()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password'  => 'required',
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Successfully logged in');
            return redirect()->route('users.index')->with('success', 'Successfully logged in');
        } else {
            $request->session()->flash('error_login', 'The provided credentials do not match our records.');
            return redirect()->route('login')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('users.index');
    }
}
