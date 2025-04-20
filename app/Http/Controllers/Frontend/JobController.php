<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AppliedJob;
use App\Models\Category;
use App\Models\EmployerUser;
use App\Models\Job;
use App\Models\SavedJob;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $filter['search']           = $request->search;
        $filter['category']         = ($request->category)?$request->category:[];
        $filter['job_type']         = $request->job_type;
        $filter['location']         = $request->location;
        $filter['experience']       = $request->experience;
        $filter['skills']           = $request->skills;

        $jobs      = Job::query();
        if($filter['search']){
            $name      = $filter['search'];
            $jobs      = $jobs->where(function($query) use ($name){
                                        $query->where('title', 'LIKE', '%'.$name.'%');
                                        $query->orWhere('description', 'LIKE', '%'.$name.'%');
                                    });
        }
        if($filter['skills']){
            $name      = $filter['skills'];
            $jobs      = $jobs->where(function($query) use ($name){
                                        $query->where('skills', 'LIKE', '%'.$name.'%');
                                        $query->orWhere('role', 'LIKE', '%'.$name.'%');
                                    });
        }
        if($filter['experience']){
            $exact_exp = [];
            if($filter['experience'] == '0'){
                $exact_exp[] = '0-1 years';
            }
            if(in_array(($filter['experience']), [2,3,4])){
                $exact_exp[] = '2-4 years';
            }
            if(in_array(($filter['experience']), [4,5,6])){
                $exact_exp[] = '4-6 years';
            }
            if(in_array(($filter['experience']), [6,7,8])){
                $exact_exp[] = '6-8 years';
            }
            if(in_array(($filter['experience']), [8,9,10])){
                $exact_exp[] = '8-10 years';
            }
            if($filter['experience'] == '10+'){
                $exact_exp[] = '10+ years';
            }
        
            $jobs      = $jobs->whereIN('experience', $exact_exp);

        }
        $jobs      = ($filter['category'])?$jobs->whereIn('category', $filter['category']) : $jobs;
        $jobs      = ($filter['job_type']) ? $jobs->where('job_type', 'LIKE', '%' . $filter['job_type'] . '%') : $jobs;
        $jobs      = ($filter['location']) ? $jobs->where('location', 'LIKE', '%' . $filter['location'] . '%') : $jobs;
        $jobs      = $jobs->where('admin_status','Approved')->latest()->paginate(15);

        $categories = Category::all();

        return view('frontend/job/index', compact('jobs', 'filter', 'categories'));
    }

    public function show($slug)
    { 
        $job = Job::where('slug', $slug)->first();
        $related_jobs = Job::where('role', $job->role)
                            ->where('admin_status', 'Approved')
                            ->where('id', '!=', $job->id)
                            ->where('category', $job->category)
                            ->limit(3)->get();
        if($related_jobs->isEmpty()){
             
            $related_jobs = Job::where('role', $job->role)
                        ->where('admin_status', 'Approved')
                        ->where('id', '!=', $job->id)
                        ->limit(3)->get();

        }
        if($related_jobs->isEmpty()){
            $related_jobs = Job::where('category', $job->category)
                        ->where('admin_status', 'Approved')
                        ->where('id', '!=', $job->id)
                        ->limit(3)->get();

        } 
        if($related_jobs->isEmpty()){
            $related_jobs = Job::where('admin_status', 'Approved')
                        ->where('id', '!=', $job->id)
                        ->inRandomOrder()
                        ->limit(3)->get();

        } 
            
        return view('frontend/job/show', compact('job','related_jobs'));
    }
    public function apply($slug)
    { 
        if (auth()->user()) {
            $job = Job::where('slug', $slug)->first();
            if ($job) {
                AppliedJob::create([
                    'employer_id' => $job->employer_id,
                    'employee_id' => auth()->user()->id,
                    'job_id'      => $job->id,
                    'status'      => 'Pending',
                ]);
                EmployerUser::create([
                    'employer_id' => $job->employer_id,
                    'employee_id' => auth()->user()->id
                ]);

                return redirect()->back()->with('success', 'Your application has been submitted successfully.');
            }
       
        } else {
            session(['job_slug' => $slug]);
            return redirect()->route('login')->with('warning', 'Please login to apply for this job.');
        }
    }
    public function saved($slug)
    { 
        if (auth()->user()) {
            $job = Job::where('slug', $slug)->first();
            if ($job) {
                SavedJob::create([
                    'employer_id' => $job->employer_id,
                    'employee_id' => auth()->user()->id,
                    'job_id'      => $job->id,
                    'status'      => 'Pending',
                ]);
                return redirect()->back()->with('success', 'Job Saved successfully.');
            }
       
        } else {
            session(['job_slug' => $slug]);
            return redirect()->route('login')->with('warning', 'Please login to saved for this job.');
        }
    }
}
