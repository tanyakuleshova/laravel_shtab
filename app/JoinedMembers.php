<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JoinedMembers extends Model
{
    protected $fillable = [
        'joinForm_name', 'joinForm_email', 'joinForm_phone', 'joinForm_region',
        'joinForm_social_link', 'joinForm_additional_msg', 'joinForm__HelpType'

    ];
}
