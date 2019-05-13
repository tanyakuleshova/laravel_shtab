<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteers extends Model
{
    protected $fillable = [
        'name', 'surname', 'img'
    ];
}
