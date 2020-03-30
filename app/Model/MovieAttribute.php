<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MovieAttribute extends Model
{
    //

    protected $table = 'movie_attributes';

    protected $fillable = ['movie_id', 'day', 'time'];

    public function movie()
    {
        return $this->belongsTo(Movies::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
}
