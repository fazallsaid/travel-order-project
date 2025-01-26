<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'schedule_id';
    protected $fillable = [
        'from',
        'to',
        'departure_date',
        'departure_time',
        'passenger_quota',
        'ticket_price',
    ];
}
