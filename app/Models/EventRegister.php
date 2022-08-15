<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'email',
        'name',
        'team_name',
        'team_leader',
        'gender',
        'agency',
        'phone',
        'card',
        'photo',
        'payment',
        'twibbon',
        'follow_ig_cmc',
        'follow_ig_sekoin',
        'payment',
        'register_type'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function event_transaction()
    {
        return $this->hasOne(EventTransaction::class);
    }

    public function event_package()
    {
        return $this->hasOneThrough(
            EventPackage::class,
            EventTransaction::class,
            'event_register_id',
            'id',
            'id',
            'event_package_id'
        );
    }
}
