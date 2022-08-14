<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_package_id',
        'event_register_id',
        'order_id',
        'pay_time',
        'pay_status'
    ];

    public function event_package()
    {
        return $this->belongsTo(EventPackage::class, 'event_package_id');
    }

    public function event_register()
    {
        return $this->belongsTo(EventRegister::class, 'event_register_id');
    }
}
