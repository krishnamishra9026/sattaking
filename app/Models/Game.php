<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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

    public function getMonthlyResults($month, $year)
    {
        return $this->results()
            ->whereMonth('result_date', $month)
            ->whereYear('result_date', $year)
            ->orderBy('result_date')
            ->get();
    }

    public function getWeeklyResults()
    {
        return $this->results()
            ->whereBetween('result_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('result_date')
            ->get();
    }

    public function getMostRepeatedNumber()
    {
        return $this->results()
            ->whereYear('result_date', Carbon::now()->year)
            ->select('result_number')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('result_number')
            ->orderByDesc('count')
            ->first();
    }
}