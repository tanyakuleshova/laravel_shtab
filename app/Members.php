<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $fillable = [
        'name', 'surname', 'position', 'img', 'facebook_link', 'twitter_link'
    ];
}
