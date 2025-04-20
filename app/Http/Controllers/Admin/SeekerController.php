<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SeekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $users = User::with('info')
        ->when($request->filled('date'), function ($query) use ($request) {
            $query->whereDate('created_at', $request->date);
        })
        ->when($request->filled('name'), function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->name . '%');
        })
        ->when($request->filled('email'), function ($query) use ($request) {
            $query->where('email', 'like', '%' . $request->email . '%');
        })
        ->when($request->filled('phone'), function ($query) use ($request) {
            $query->whereHas('info', function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->phone . '%');
            });
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            $query->where('status', $request->status);
        })
        ->latest('id')
        ->paginate(20);              

        return view ('admin.seeker.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employer = User::find($id);
        return view('admin.seeker.show',compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employer = User::find($id);
        return view ('admin.seeker.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {              
        $request->validate([
            'name'                  => ['required'],
        ]);

        $input = $request->except('_token');

        if ($request->hasfile('verification_document')) {                  

            if (isset($admin->verification_document)) {

                $path   = 'public/uploads/employer/documents/verification/' . $admin->verification_document;

                Storage::delete($path);
            }

            $image      = $request->file('verification_document');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/employer/documents/verification/', $name, 'public');

            $input['verification_document'] = $name;
        }

        if ($request->hasfile('logo')) {                  

            if (isset($admin->logo)) {

                $path   = 'public/uploads/employer/logo/' . $admin->logo;

                Storage::delete($path);
            }

            $image      = $request->file('logo');

            $name       = $image->getClientOriginalName();

            $image->storeAs('uploads/employer/logo/', $name, 'public');

            $input['logo'] = $name;
        }              

        User::find($id)->update($input);

        return redirect()->route('admin.seeker.index')->with('success', 'Package added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employer = User::find($id);
        $employer->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
}
