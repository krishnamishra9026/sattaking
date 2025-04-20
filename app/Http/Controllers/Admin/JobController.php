<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Designation;
use App\Models\Job;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter                  = [];
        $filter['posted_date']   = $request->posted_date;
        $filter['title']         = $request->title;
        $filter['industry']      = $request->industry;
        $filter['job_type']      = $request->job_type;
        $filter['job_status']    = $request->job_status;
        $filter['status']        = $request->status;
        
    
        $jobs      = Job::query();
        $jobs      = isset($filter['posted_date']) ? $jobs->whereDate('created_at', $filter['posted_date']) : $jobs;
        $jobs      = isset($filter['title']) ? $jobs->where('title', 'LIKE', '%' . $filter['title'] . '%') : $jobs;
        $jobs      = isset($filter['industry']) ? $jobs->where('category', 'LIKE', '%' . $filter['industry'] . '%') : $jobs;
        $jobs      = isset($filter['job_type']) ? $jobs->where('job_type', 'LIKE', '%' . $filter['job_type'] . '%') : $jobs;
        $jobs      = isset($filter['job_status']) ? $jobs->where('status', 'LIKE', '%' . $filter['job_status'] . '%') : $jobs;
        $jobs      = isset($filter['status']) ? $jobs->where('admin_status', 'LIKE', '%' . $filter['status'] . '%') : $jobs;
        $jobs      = $jobs->latest()->paginate(20);

        $industries = Category::all();

        return view('admin.job.index',compact('jobs','filter','industries'));
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
    public function show(Job $job)
    {
        $employees = $job->appliedJobs()->paginate(20);
        return view('admin.job.show',compact('job','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = Category::all();
        $roles      = Designation::where('status','Enabled')->get();
        $skills      = Skills::where('status','Enabled')->get();
        return view('admin.job.edit',compact('job','categories','roles','skills'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Job $job)
    {
        $this->validate($request, [
            'title'         => 'required',
            'description'   => 'required',
            'location'      => 'required',
            'category'      => 'required',
            'role'          => 'required',
            'skills'        => 'required|array|min:1',
            'positions'     => 'required',
            'job_type'      => 'required',
            'working_hour_from' => 'required',
            'working_hour_to' => 'required',
            'experience'    => 'required',
            'requirements'  => 'required|array|min:1',
            'starting_salary' => 'required',
            'salary_upto'   => 'required',
            'education'     => 'required',
            'deadline'      => 'required'
        ]);

        $job->title          =  $request->title; 
        $job->slug           =  Str::slug($request->title);
        $job->category       =  $request->category; 
        $job->role           =  $request->role;
        $job->positions      =  $request->positions; 
        $job->location       =  $request->location;
        $job->job_type       =  $request->job_type;
        $job->working_hour_from =  $request->working_hour_from;
        $job->working_hour_to =  $request->working_hour_to;
        $job->description    =  $request->description;
        $job->requirements   =  $request->requirements;
        $job->experience     =  $request->experience;
        $job->skills         =  $request->skills;
        $job->starting_salary =  $request->starting_salary;
        $job->salary_upto    =  $request->salary_upto;
        $job->education      =  $request->education;
        $job->deadline       =  $request->deadline;
        $job->save();


        return redirect()->route('admin.job.index')->with('success', 'Job Saved Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job->delete();
        return redirect()->back()->with('success', 'Job deleted successfully');
    }
    public function changeStatus(Request $request)
    {
        $job = Job::find($request->id);
        if ($job) {
            $job->admin_status = $request->status;
            $job->save();
            return response()->json(['success' => 'Status updated successfully.']);
        }
        return response()->json(['error' => 'Job not found.'], 404);
    }

    public function showCandidate()
    {
        return view('admin.job.show-candidate');
    }

    public function candidates()
    {
        return view('admin.job.candidates');
    }
}
