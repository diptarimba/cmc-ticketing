<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'name',
        'price'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function event_transaction()
    {
        return $this->hasMany(EventTransaction::class);
    }
}
