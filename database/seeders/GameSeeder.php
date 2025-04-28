<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run()
    {
        $games = [
            ['title' => 'Desawar', 'time' => '5:00 AM'],
            ['title' => 'Gali', 'time' => '11:30 PM'],
            ['title' => 'Faridabad', 'time' => '6:00 PM'],
            // Add other games here
        ];

        foreach ($games as $game) {
            Game::create($game);
        }
    }
}