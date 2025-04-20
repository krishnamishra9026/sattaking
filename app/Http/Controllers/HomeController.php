<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        if (Auth::guard('admin')->check()) 
        { 
            return redirect()->route('admin.dashboard.index');
        }
        if (Auth::guard('employer')->check()) 
        { 
            return redirect()->route('employer.dashboard.index');
        }
        if (Auth::check()) 
        { 
            if (session('job_slug')) {
                $slug = session('job_slug');
                session()->forget('job_slug');
                return redirect()->route('job.detail', $slug);
            }
            return redirect()->route('dashboard.index');
        }
        return redirect()->route('home.index');
    }
}
