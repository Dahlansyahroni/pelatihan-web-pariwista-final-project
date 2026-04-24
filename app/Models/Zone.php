<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = [
        "name",
        "description",
        "price_range",
        "image"
    ];

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
