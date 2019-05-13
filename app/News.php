<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'adress', 'h1', 'short_content', 'content', 'post_date', 'img'
    ];
}
