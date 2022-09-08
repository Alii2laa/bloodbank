<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [
        'subject',
        'message',
        'email',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
