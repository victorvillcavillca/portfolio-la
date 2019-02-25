<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
       $rules = [
            'name'  => 'required',
            'email' => 'required',
        ];

        if($this->get('image'))
            $rules = array_merge($rules, ['image' => 'required|mimes:jpg,jpeg,png']);

        return $rules;
    }
}
