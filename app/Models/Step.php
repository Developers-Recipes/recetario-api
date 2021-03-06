<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Recipe;

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

    /**
     * Relaciones
     */

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}