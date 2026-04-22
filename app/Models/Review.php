<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
   protected $fillable = [
    'attraction_id',
    'user_id',
    'visitor_name',
    'visitor_email',
    'rating',
    'comment',
    'is_approved',
];

    public function attraction()
    {
        return $this->belongsTo(Attraction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
