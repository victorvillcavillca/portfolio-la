<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationUpdateRequest extends FormRequest
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
            'name'          => 'required',
            'slug'          => 'required',
            'time'          => 'required',
            'end_date'      => 'required',
            'user_id'       => 'required|integer',
            'evaluation_category_id' => 'required|integer',
            'status'        => 'required',
        ];
    }
}
