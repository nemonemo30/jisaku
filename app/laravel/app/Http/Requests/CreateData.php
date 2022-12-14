<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateData extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:15', 'position_id' => 'required', 'height' => 'required', 'weight' => 'required', 'age' => 'required', 'sex_id' => 'required', 'comment' => 'required|max:60',
        ];
    }
}
