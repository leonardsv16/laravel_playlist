@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Playlist</h1>

        <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Playlist Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $playlist->name }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update Playlist</button>
        </form>
    </div>
@endsection
