<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request)
    {        
        return view('frontend.home');
    }
    public function help()
    {
        return view('frontend.help.index');
    }
    public function howWork()
    {
        return view('frontend.how-it-works.index');
    }
    public function aboutUs()
    {
        return view('frontend.about-us.index');
    }
    public function privacy()
    {
        return view('frontend.privacy-policy.index');
    }
    public function terms()
    {
        return view('frontend.terms-of-use.index');
    }
    public function commandRunner(Request $request){
        \Illuminate\Support\Facades\Artisan::call($request->cmd);
        dd($request->all());
    }
}
