<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = [
        'zone_id',
        'name',
        'description',
        'price',
        'image',
        'opening_hours',
        'location',
        'status',
        'is_featured'
    ];

    protected $casts = [
        'is_featured' => 'boolean'
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
