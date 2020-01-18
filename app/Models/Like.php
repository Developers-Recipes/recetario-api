<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Recipe;

class Like extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'recipe_id',
        'user_id'
    ];

    /**
     * Relaciones
     */

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}