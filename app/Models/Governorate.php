<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{


    protected $fillable = [
        'name'
    ];
    protected $hidden = ['pivot'];

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function mClients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
