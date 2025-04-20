@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Game</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.games.index') }}" class="btn btn-light">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Game Name</label>
                <input type="text" name="name" id="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $game->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3" 
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $game->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="game_time" class="form-label">Game Time</label>
                <input type="time" name="game_time" id="game_time" 
                    class="form-control @error('game_time') is-invalid @enderror"
                    value="{{ old('game_time', optional($game->game_time)->format('H:i')) }}">
                @error('game_time')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status', $game->status) == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $game->status) == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update Game</button>
            </div>
        </form>
    </div>
</div>
@endsection