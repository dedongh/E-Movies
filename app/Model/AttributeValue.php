<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    //
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id', 'value', 'price'
    ];

    protected $casts = [
        'attribute_id'  =>  'integer',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function movieAttributes()
    {
        return $this->belongsToMany(MovieAttribute::class);
    }
}
