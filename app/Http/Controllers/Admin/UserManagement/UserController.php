<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users    = Admin::with('roles');
        $users    = $users->orderBy('id', 'desc')->paginate(20);

        return view('admin.user-management.users.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get(['id', 'name']);
        return view('admin.user-management.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'email'     => 'required|email|unique:admins,email',
            'password'  => 'required',
            'roles'     => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $user = Admin::create($input);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);

        return redirect()->route('admin.user-management.users.index')->with('success', 'User saved Successfully');
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
    public function edit(Admin $user)
    {
        $roles = Role::get(['id', 'name']);              
        return view('admin.user-management.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $user)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'email' => 'required|email|unique:admins,email,'.$user->id,
            'roles' => 'required'
        ]);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
              
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect()->route('admin.user-management.users.index')->with('success', 'User updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $user)
    {
        $user->delete();
        return redirect()->route('admin.user-management.users.index')->with('success', 'User deleted Successfully');
    }
}
