@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Playlist</h1>

        <form action="{{ route('playlists.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Playlist Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Create Playlist</button>
        </form>
    </div>
@endsection
