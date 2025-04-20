<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'game_time',
        'status'
    ];

    protected $casts = [
        'game_time' => 'datetime:H:i'
    ];

    public function results()
    {
        return $this->hasMany(GameResult::class);
    }
}