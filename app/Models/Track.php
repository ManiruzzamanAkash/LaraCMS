<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Track extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'reference_link', 'admin_id', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * newTrack
     *
     * @param string $title
     * @param string $description
     * @return void Create new track entry after any action
     */
    public static function newTrack($title, $description)
    {
        $track = new Track();
        $track->title = $title;
        $track->description = $description;
        $track->admin_id = Auth::id();
        $track->save();
    }
}
