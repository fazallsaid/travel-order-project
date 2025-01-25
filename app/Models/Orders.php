<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_code',
        'user_id',
        'schedule_id',
        'order_date',
        'order_time',
        'order_status',
    ];
}
