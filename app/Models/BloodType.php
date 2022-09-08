<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{


    protected $fillable = [
        'name'
    ];
    protected $hidden = ['pivot'];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function donationRequestBlood()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function mClients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
