@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Games</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.games.create') }}" class="btn btn-primary">Add New Game</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Game Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td>{{ $game->game_time ? $game->game_time->format('H:i') : 'N/A' }}</td>
                    <td>{{ $game->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.games.edit', $game->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.games.destroy', $game->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $games->links() }}
    </div>
</div>
@endsection