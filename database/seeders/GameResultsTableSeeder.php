<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\GameResult;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GameResultsTableSeeder extends Seeder
{
    public function run()
    {
        $games = Game::all();
        $startDate = Carbon::now()->subMonths(2)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        foreach ($games as $game) {
            $currentDate = clone $startDate;

            while ($currentDate <= $endDate) {
                // Skip future dates
                if ($currentDate->isToday() && $this->isTimeInFuture($game->game_time)) {
                    $currentDate->addDay();
                    continue;
                }

                GameResult::create([
                    'game_id' => $game->id,
                    'result_date' => $currentDate->format('Y-m-d'),
                    'result_number' => str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT)
                ]);

                $currentDate->addDay();
            }
        }
    }

    private function isTimeInFuture($gameTime)
    {
        $currentTime = Carbon::now();
        return $currentTime->format('H:i') < $gameTime;
    }
}