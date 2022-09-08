<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{

    protected $fillable = [
        'patient_name',
        'patient_age',
        'patient_phone',
        'hospital',
        'address',
        'bags_quantity',
        'latitude',
        'longitude',
        'notes',
        'city_id',
        'blood_type_id',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}
