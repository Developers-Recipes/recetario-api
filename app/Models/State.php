<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Recipe;

class State extends Model
{

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
        return $this->hasMany(Recipe::class);
    }
}