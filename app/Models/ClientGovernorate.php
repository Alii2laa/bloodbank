<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGovernorate extends Model
{

    protected $fillable = [
        'client_id',
        'governorate_id'
    ];

    public $timestamps = true;
}
