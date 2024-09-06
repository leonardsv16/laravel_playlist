@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add a Song to Playlist</h1>

        <form action="{{ route('playlists.addSong', ['playlist' => $playlist->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="song_id">Song</label>
                <select name="song_id" id="song_id" class="form-control" required>
                    @foreach($songs as $song)
                        <option value="{{ $song->id }}">{{ $song->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Song</button>
        </form>
    </div>
@endsection
