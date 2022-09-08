<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodTypeClient extends Model
{

    protected $fillable = [
        'blood_type_id',
        'client_id'
    ];

    public $timestamps = true;



}
