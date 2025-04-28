<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $games = Game::with(['results' => function ($query) {
            $query->whereIn('date', [
                Carbon::today()->format('Y-m-d'),
                Carbon::yesterday()->format('Y-m-d')
            ])
            ->orderBy('date', 'desc');
        }])->get();

              echo '<pre>'; print_r($games->toArray()); echo '</pre>'; exit();
              

        return view('frontend.home', compact('games'));
    }
}