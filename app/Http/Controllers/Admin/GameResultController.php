<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameResult;
use Illuminate\Http\Request;

class GameResultController extends Controller
{
    public function index()
    {
        $results = GameResult::with('game')->latest()->paginate(10);
        return view('admin.games.results.index', compact('results'));
    }

    public function create()
    {
        $games = Game::where('status', true)->get();
        return view('admin.games.results.create', compact('games'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'result_number' => 'required|string',
            'result_date' => 'required|date',
            'status' => 'required|boolean'
        ]);

        GameResult::create($request->all());
        return redirect()->route('admin.games.result.index')->with('success', 'Result created successfully');
    }

    public function edit($id)
    {
        $result = GameResult::findOrFail($id);
        $games = Game::where('status', true)->get();
        return view('admin.games.results.edit', compact('result', 'games'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'result_number' => 'required|string',
            'result_date' => 'required|date',
            'status' => 'required|boolean'
        ]);

        $result = GameResult::findOrFail($id);
        $result->update($request->all());
        return redirect()->route('admin.games.result.index')->with('success', 'Result updated successfully');
    }

    public function destroy($id)
    {
        GameResult::findOrFail($id)->delete();
        return redirect()->route('admin.games.result.index')->with('success', 'Result deleted successfully');
    }
}