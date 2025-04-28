<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    protected $fillable = ['game_id', 'result_number', 'result_date'];

    protected $dates = ['result_date'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}