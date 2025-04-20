<?php

namespace App\Http\Controllers\Admin\UserManagement;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
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
        $roles = Role::all();
        return view('admin.user-management.roles.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get(['id', 'name']);
        return view('admin.user-management.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'          => 'required',
            "permission"    => "required|array|min:1",
            "permission.*"  => "required|distinct|min:1",
        ]);

        $role = new Role;
        $role->name = $request->name;
        $role->save();
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.user-management.roles.index')->with('success', 'Role saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role        = Role::find($id);
        $permissions = Permission::get(['id', 'name']);

        return view('admin.user-management.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'name'          => 'required',
            "permission"    => "required|array|min:1",
            "permission.*"  => "required|distinct|min:1",
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $permissions = $request->input('permission') ? $request->input('permission') : [];
        $role->syncPermissions($permissions);

        return redirect()->route('admin.user-management.roles.index')->with('success', 'Role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();

        return redirect()->route('admin.user-management.roles.index')->with('success', 'Role deleted Successfully');
    }
}
