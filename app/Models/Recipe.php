<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    const PENDING_STATE = 'pending';
    const IN_PROGRESS_STATE = 'in progress';
    const READY_STATE = 'ready';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'state_id',
        'forked_from',
        'name',
        'description',
        'likes',
        'is_current'
    ];
}