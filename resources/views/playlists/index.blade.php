@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Playlists</h1>
        <a href="{{ route('playlists.create') }}" class="btn btn-primary">Create New Playlist</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($playlists as $playlist)
                    <tr>
                        <td>{{ $playlist->id }}</td>
                        <td>{{ $playlist->name }}</td>
                        <td>
                            <a href="{{ route('playlists.show', $playlist->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
