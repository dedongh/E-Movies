<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MovieAttribute extends Model
{
    //

    protected $table = 'movie_attributes';

    protected $fillable = ['movies_id', 'day', 'time','attribute_id',
        'auditorium','ticket_price','tickets_avail'];

    public function movie()
    {
        return $this->belongsTo(Movies::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
