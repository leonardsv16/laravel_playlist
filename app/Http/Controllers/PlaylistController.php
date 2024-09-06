<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
{
    $playlists = Playlist::all();
    return view('playlists.index', ['playlists' => $playlists]); // Ensure 'playlists.index' is correct
}


    public function create()
    {
        return view('playlists.create');
    }
    public function addSong(Request $request, Playlist $playlist)
{
    // Validate the song selection
    $request->validate([
        'song_id' => 'required|exists:songs,id',
    ]);

    // Add the song to the playlist (ensure your Playlist model has a songs relationship)
    $playlist->songs()->attach($request->song_id);

    return redirect()->route('playlists.show', $playlist->id)
        ->with('success', 'Song added to playlist successfully.');
}

    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        Playlist::create($request->all());

        return redirect()->route('playlists.index')->with('success', 'Playlist created successfully.');
    }

    public function show(Playlist $playlist)
{
    $songs = Song::all(); // Fetch all songs to display in the dropdown
    return view('playlists.show', compact('playlist', 'songs'));
}


    public function edit(Playlist $playlist)
    {
        return view('playlists.edit', compact('playlist'));
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $playlist->update($request->all());

        return redirect()->route('playlists.index')->with('success', 'Playlist updated successfully.');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist deleted successfully.');
    }
}


