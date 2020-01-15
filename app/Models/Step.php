<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    const COMPLETED_STEP = true;
    const INCOMPLETED_STEP = false;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'recipe_id',
        'number_step',
        'name',
        'description',
        'link',
        'completed'
    ];
}