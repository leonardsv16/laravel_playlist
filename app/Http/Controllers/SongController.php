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
}
