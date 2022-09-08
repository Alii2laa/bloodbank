<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name',
        'governorate_id'
    ];

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function donationRequestCity()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}
