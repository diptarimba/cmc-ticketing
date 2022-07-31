<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'location',
        'description',
        'date'
    ];

    public function event_image()
    {
        return $this->hasOne(EventImage::class);
    }
}
