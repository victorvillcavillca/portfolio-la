<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EvaluationRequest extends FormRequest
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
            'slug'          => 'required|unique:evaluations,slug',
            'time'          => 'required',
            'end_date'          => 'required',
            'user_id'       => 'required|integer',
            'matter_id' => 'required|integer',
            'status'        => 'required',
        ];
    }
}
