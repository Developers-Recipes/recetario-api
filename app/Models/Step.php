<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    const COMPLETED_STEP = true;
    const INCOMPLETED_STEP = false;

    protected $fillable = [
        'recipe_id',
        'number_step',
        'name',
        'description',
        'link',
        'completed'
    ];
}