<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employers = Employer::query()
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
            $query->where('phone', 'like', '%' . $request->phone . '%');
        })
        ->when($request->filled('company'), function ($query) use ($request) {
            $query->where('company_name', 'like', '%' . $request->company . '%');
        })
        ->when($request->filled('status'), function ($query) use ($request) {
            if ($request->status == 'Approval Pending') {
                $query->whereNull('email_verified_at');
            }else if($request->status == 'Approved'){
                $query->whereNotNull('email_verified_at');
            }else{
                $query->where('status', $request->status);
            }
        })
        ->latest('id')
        ->paginate(20);

        return view ('admin.employer.index', compact('employers'));
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
        $employer = Employer::find($id);
        return view('admin.employer.show',compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employer = Employer::find($id);
        return view ('admin.employer.edit', compact('employer'));
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

        Employer::find($id)->update($input);

        return redirect()->route('admin.employer.index')->with('success', 'Package added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employer = Employer::find($id);
        $employer->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
}
