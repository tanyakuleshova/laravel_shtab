<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorruptionInfo extends Model
{
    protected $fillable = [
        'corruptionForm_name', 'corruptionForm_region', 'corruptionForm_phone', 'corruptionForm_situation',
        'corruptionForm_email', 'corruptionForm_arguments', 'corruptionForm_corruptName', 'corruptionForm_files'

    ];
}
