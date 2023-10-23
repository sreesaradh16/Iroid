<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest:user')->except('logout');
    }
    public function viewLogin()
    {
        return view('user.auth.login');
    }
    public function viewRegister()
    {
        return view('user.auth.register');
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email'   => 'required',
            'password'  => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);

        DB::beginTransaction();
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('user.register');
        }
        DB::commit();
        $request->session()->flash('success', 'User created successfully');
        return redirect()->route('user.login');
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

        if (Auth::guard('user')->attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('success', 'Successfully logged in');
            return redirect()->route('user.posts.index')->with('success', 'Successfully logged in');
        } else {
            $request->session()->flash('error_login', 'The provided credentials do not match our records.');
            return redirect()->route('user.login')->withInput();
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.users.index');
    }
}
