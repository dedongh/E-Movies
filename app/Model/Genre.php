<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Genre extends Model
{
    //
    protected $table = 'genres';

    protected $fillable = [
        'name', 'slug', 'description', 'parent_id', 'featured', 'menu', 'status', 'image'
    ];

    protected $casts = [
        'parent_id' =>  'integer',
        'featured'  =>  'boolean',
        'menu'      =>  'boolean',
        'status'    =>  'boolean'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // parent genre
    public function parent()
    {
        return $this->belongsTo(Genre::class, 'parent_id');
    }

    // children genre
    public function children()
    {
        return $this->hasMany(Genre::class, 'parent_id');
    }

    public function movies()
    {
        return $this->belongsToMany(Movies::class,'movies_genres','genre_id','movie_id');
    }
}
