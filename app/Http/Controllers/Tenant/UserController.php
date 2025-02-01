<?php

namespace App\Http\Controllers\Tenant;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('roles')->orderBy('created_at', 'desc')->get();
        return Inertia::render('Tenant/User/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Tenant/User/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validation
        $validateData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users,email",
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($validateData);
        User::create($validateData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('Tenant/User/Edit', [
            'user' => $user,
            'userRoles' => $user->roles->pluck('name'), // 获取用户当前的角色
            'availableRoles' => Role::all()->pluck('name') // 获取所有可用角色
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|max:255|unique:users,email,$user->id",
            "roles" => "required|array",
        ]);
        // dd($validateData);
        $user->update($validateData);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
