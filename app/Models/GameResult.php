<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameResult extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'game_id',
        'result_number',
        'result_date',
        'status'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}