<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'benefactor_name', 'benefactor_email', 'benefactor_sum',
    ];
}
