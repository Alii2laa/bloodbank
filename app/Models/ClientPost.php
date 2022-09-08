<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPost extends Model
{

    protected $fillable = [
        'client_id',
        'post_id'
    ];

}
