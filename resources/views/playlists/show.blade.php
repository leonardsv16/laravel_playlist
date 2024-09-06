@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Playlist: {{ $playlist->name }}</h1>
        <a href="{{ route('playlists.index') }}" class="btn btn-secondary mb-3">Back to Playlists</a>

        <div class="card">
            <div class="card-header">
                Playlist Details
            </div>
            <div class="card-body">
                <h5 class="card-title">Playlist Name: {{ $playlist->name }}</h5>
                <p class="card-text">Created at: {{ $playlist->created_at->format('d M Y, H:i') }}</p>
                <p class="card-text">Updated at: {{ $playlist->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>

        <hr>

        <h3>Songs in this Playlist</h3>
        @if($playlist->songs->isEmpty())
            <p>No songs in this playlist yet.</p>
        @else
            <ul class="list-group">
                @foreach($playlist->songs as $song)
                    <li class="list-group-item">{{ $song->name }}</li>
                @endforeach
            </ul>
        @endif

        <hr>

        <h3>Add Song to Playlist</h3>
        <form action="{{ route('playlists.addSong', $playlist->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="song_id">Select Song:</label>
                <select name="song_id" id="song_id" class="form-control">
                    @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Song</button>
        </form>

        <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn btn-warning mt-3">Edit Playlist</a>

        <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this playlist?');">Delete Playlist</button>
        </form>
    </div>
@endsection
