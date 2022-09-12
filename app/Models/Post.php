<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    protected $fillable = [
        'title',
        'image',
        'content',
        'category_id'
    ];

    protected $appends = ['is_favourite'];



    protected $hidden = [
        'pivot',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function mClients()
    {
        return $this->belongsToMany('App\Models\Client');
    }

    protected function IsFavourite(): Attribute
    {
        $user = Auth::guard('client')->user();

        if ($user){
            $post = Post::whereHas('mClients',function ($query) use ($user){
                $query->where('client_id',$user->id);
            })->find($this->id);
        }

        return Attribute::make(
            get: fn ($value) =>  (bool)$post,
        );
    }



}
