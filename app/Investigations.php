<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigations extends Model
{
    protected $fillable = [
        'source', 'h1', 'short-content', 'content', 'post_date', 'img'
    ];
}
