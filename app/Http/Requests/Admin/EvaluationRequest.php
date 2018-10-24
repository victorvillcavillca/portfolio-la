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
            // 'slug'          => 'required|unique:posts,slug',
            'user_id'       => 'required|integer',
            'specialty_id'   => 'required|integer',
            // 'tags'          => 'required|array',
            // 'body'          => 'required',
            'status'        => 'required',
        ];
    }
}
