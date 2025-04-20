<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::latest()->paginate(10);
        return view('admin.games.index', compact('games'));
    }

    public function create()
    {
        return view('admin.games.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_time' => 'required|date_format:H:i',
            'status' => 'required|boolean'
        ]);

        Game::create($request->all());
        return redirect()->route('admin.games.index')->with('success', 'Game created successfully');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);
        return view('admin.games.edit', compact('game'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'game_time' => 'required|date_format:H:i',
            'status' => 'required|boolean'
        ]);

        $game = Game::findOrFail($id);
        $game->update($request->all());
        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully');
    }

    public function destroy($id)
    {
        Game::findOrFail($id)->delete();
        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully');
    }
}