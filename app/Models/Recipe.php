<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    const PENDING_STATE = 'pending';
    const IN_PROGRESS_STATE = 'in progress';
    const READY_STATE = 'ready';

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