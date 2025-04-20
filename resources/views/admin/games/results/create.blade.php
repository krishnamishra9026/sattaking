@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Game Result</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.games.result.index') }}" class="btn btn-light">Back</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.games.result.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="game_id" class="form-label">Game</label>
                <select name="game_id" id="game_id" class="form-select @error('game_id') is-invalid @enderror">
                    <option value="">Select Game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>
                            {{ $game->name }}
                        </option>
                    @endforeach
                </select>
                @error('game_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="result_number" class="form-label">Result Number</label>
                <input type="text" name="result_number" id="result_number" 
                    class="form-control @error('result_number') is-invalid @enderror"
                    value="{{ old('result_number') }}">
                @error('result_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="result_date" class="form-label">Result Date</label>
                <input type="date" name="result_date" id="result_date" 
                    class="form-control @error('result_date') is-invalid @enderror"
                    value="{{ old('result_date') }}">
                @error('result_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create Result</button>
            </div>
        </form>
    </div>
</div>
@endsection