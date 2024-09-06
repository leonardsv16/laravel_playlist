<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name','title', 'playlist_id'];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }
}
