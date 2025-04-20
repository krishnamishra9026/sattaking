<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\URL;

class RolesController extends Controller
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
        $roles = Designation::paginate(10);

        return view('admin.master.roles.list',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $role = new Designation();
        $role->title       = $request->title;
        $role->status      = $request->status;
        $role->save();

        return redirect()->route('admin.master.roles.index')->with('success', 'Role saved Successfully');
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
    public function edit(Designation $role)
    {
        return view('admin.master.roles.edit',compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Designation $role)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $role->title       = $request->title;
        $role->status      = $request->status;
        $role->save();

        return redirect()->route('admin.master.roles.index')->with('success', 'Role updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $role)
    {
        $role->delete();
        return redirect()->route('admin.master.roles.index')->with('success', 'Category deleted Successfully');
    }
}
