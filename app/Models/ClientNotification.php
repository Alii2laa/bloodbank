<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model
{

    protected $fillable = [
        'is_read',
        'client_id',
        'notification_id'
    ];

}
