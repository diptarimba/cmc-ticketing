<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'description',
        'date',
        'is_register',
        'is_gallery',
        'register_type'
    ];

    public function event_image()
    {
        return $this->hasOne(EventImage::class);
    }

    public function event_document()
    {
        return $this->hasMany(EventDocument::class);
    }

    public function event_register()
    {
        return $this->hasMany(EventRegister::class);
    }

    public function event_package()
    {
        return $this->hasMany(EventPackage::class);
    }
}
