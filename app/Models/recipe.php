<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    const PENDING_STATE = 'pending';
    const IN_PROGRESS_STATE = 'in progress';
    const READY_STATE = 'ready';
}