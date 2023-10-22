<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'nullable||file|max:2048',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        DB::beginTransaction();
        try {
            $this->user->create($request->all());
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('users.index');
        }
        DB::commit();
        $request->session()->flash('success', 'User created successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'image' => 'nullable||file|max:2048',
        ], [
            'admin_name.required' => 'Name is required',
            'role.required' => 'Role is required',
            'username.required' => 'Username is required',
            'email.required' => 'Email is required',
        ]);


        DB::beginTransaction();
        try {
            $this->user->update($request->all(), $user);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('users.index');
        }
        DB::commit();
        $request->session()->flash('success', 'User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        DB::beginTransaction();
        try {
            $this->user->delete($user);
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'Something Went Wrong');
            return redirect()->route('users.index');
        }
        DB::commit();
        $request->session()->flash('success', 'User deleted successfully');
        return redirect()->route('users.index');
    }
}
