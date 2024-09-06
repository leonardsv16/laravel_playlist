<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;

Route::get('playlists', [PlaylistController::class, 'index'])->name('playlists.index'); // Show all playlists
Route::get('playlists/create', [PlaylistController::class, 'create'])->name('playlists.create'); // Show form to create a new playlist
Route::post('playlists', [PlaylistController::class, 'store'])->name('playlists.store'); // Store new playlist
Route::get('playlists/{playlist}', [PlaylistController::class, 'show'])->name('playlists.show'); // Show single playlist
Route::get('playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlists.edit'); // Edit a playlist
Route::put('playlists/{playlist}', [PlaylistController::class, 'update'])->name('playlists.update'); // Update playlist
Route::delete('playlists/{playlist}', [PlaylistController::class, 'destroy'])->name('playlists.destroy'); // Delete a playlist

// Route::get('/', function () {
//     return view('playlist.index');
// });
