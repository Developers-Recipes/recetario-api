<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use App\Models\State;
use App\Models\Step;
use App\Models\Like;

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

    /**
     * Relaciones
     */

    public function steps()
    {
        return $this->hasMany(Step::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }
}