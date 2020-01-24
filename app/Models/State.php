<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Recipe;

class State extends Model
{

    const PENDING_STATE = 'pending';
    const IN_PROGRESS_STATE = 'in progress';
    const READY_STATE = 'ready';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'state'
    ];

    /**
     * Relaciones
     */

    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }

    public static function getPendigState(){
        $state = State::where('state', self::PENDING_STATE)->first();
        return $state;
    }

    public static function getInProgressState(){
        $state = State::where('state', self::IN_PROGRESS_STATE)->first();
        return $state;
    }
    
    public static function getReadyState(){
        $state = State::where('state', self::READY_STATE)->first();
        return $state;
    }
}