<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{

    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'phone',
        'last_donation_date',
        'password',
        'pin_code',
        'api_token',
        'blood_type_id',
        'city_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'api_token',
        'pin_code',
        'pivot'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

    public function mGovernorates()
    {
        return $this->belongsToMany('App\Models\Governorate')->withTimestamps();
    }

    public function mBloodTypes()
    {
        return $this->belongsToMany('App\Models\BloodType')->withTimestamps();
    }

    public function mPosts()
    {
        return $this->belongsToMany('App\Models\Post')->withTimestamps();
    }

    public function mNotifications()
    {
        return $this->belongsToMany('App\Models\Notification')->withTimestamps();
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token');
    }

}
