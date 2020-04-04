<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $table = 'reviews';

    protected $fillable = [
        'movies_id','user_id','title','review', 'rating'
    ];

    public function movies()
    {
        return $this->belongsTo(Movies::class);
    }

}
