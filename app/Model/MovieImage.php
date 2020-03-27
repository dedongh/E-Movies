<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MovieImage extends Model
{
    //

    protected $table = 'movie_images';

    protected $fillable = ['movies_id', 'full'];

    protected $casts = [
        'movies_id'    =>  'integer',
    ];

    public function movies()
    {
        return $this->belongsTo(Movies::class);
    }
}
