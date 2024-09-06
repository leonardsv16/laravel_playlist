<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SongController extends Controller
{
    public function store(Request $request, $playlistId)
    {
        $song = Song::create([
            'title' => $request->title,
            'playlist_id' => $playlistId,
        ]);
        return response()->json($song);
    }
    

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return response()->json(['message' => 'Song deleted']);
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

}
