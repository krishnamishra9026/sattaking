<?php

namespace Database\Seeders;

use App\Models\Game;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        $games = [
            ['name' => 'Desawar', 'game_time' => '05:00'],
            ['name' => 'Gali', 'game_time' => '23:30'],
            ['name' => 'Faridabad', 'game_time' => '18:15'],
            ['name' => 'Ghaziabad', 'game_time' => '20:50'],
            ['name' => 'Delhi Bazar', 'game_time' => '15:00'],
            ['name' => 'Mumbai Morning', 'game_time' => '10:45'],
            ['name' => 'Ranchi', 'game_time' => '17:00'],
            ['name' => 'Old Faridabad', 'game_time' => '19:50'],
            ['name' => 'Faridabad King', 'game_time' => '19:45'],
            ['name' => 'Delhi Star', 'game_time' => '19:45']
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}