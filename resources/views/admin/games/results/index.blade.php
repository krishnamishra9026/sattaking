@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Game Results</h3>
        <div class="card-toolbar">
            <a href="{{ route('admin.games.result.create') }}" class="btn btn-primary">Add New Result</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Result Number</th>
                    <th>Result Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->game->name }}</td>
                    <td>{{ $result->result_number }}</td>
                    <td>{{ $result->result_date }}</td>
                    <td>{{ $result->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.games.result.edit', $result->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.games.result.destroy', $result->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $results->links() }}
    </div>
</div>
@endsection