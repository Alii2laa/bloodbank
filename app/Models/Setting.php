<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [
        'phone',
        'email',
        'about_us',
        'fb_link',
        'tw_link',
        'in_link',
        'yt_link',
        'notification_setting_message'
        ];

}
