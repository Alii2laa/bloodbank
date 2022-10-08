<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{


    protected $fillable = [
        'title',
        'content',
        'date',
        'donation_request_id'
    ];

    public function donationRequest()
    {
        return $this->belongsTo('App\Models\DonationRequest');
    }

    public function mClients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
