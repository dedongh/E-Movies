<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movies extends Model
{
    //
    protected $table = 'movies';

    protected $fillable = [
        'title', 'slug', 'description', 'release_date','year', 'ticket_price', 'start_show_date',
        'end_show_date', 'running_time', 'now_showing', 'new_item', 'status', 'premiere', 'featured','coming_soon'
    ];

    /**
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setReleaseDateAttribute($value)
    {
        $this->attributes['release_date'] = $value;
        $this->attributes['year'] =  \Carbon\Carbon::parse($value)->format('Y');
    }

    protected $casts = [
        'premiere' => 'boolean',
        'new_item' => 'boolean',
        'status'   => 'boolean',
        'featured' => 'boolean',
        'coming_soon' => 'boolean',
    ];

    public function images()
    {
        return $this->hasMany(MovieImage::class);
    }

    public function attributes()
    {
        return $this->hasMany(MovieAttribute::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class,'movies_genres','movie_id','genre_id');
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
}
