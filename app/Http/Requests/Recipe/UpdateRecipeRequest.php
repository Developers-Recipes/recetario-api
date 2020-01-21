<?php

namespace App\Http\Requests\Recipe;

use App\Models\State;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id === $this->user_id;;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "state_id" => 'in:' . State::IN_PROGRESS_STATE . ','
                . State::PENDING_STATE . ',' . State::READY_STATE,
            "is_current" => 'in:0,1'
        ];
    }
}