<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialtyStoreRequest extends FormRequest
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
            'name'          => 'required',
            'slug'          => 'required|unique:posts,slug',
            'order'          => 'required',
            'user_id'       => 'required|integer',
            'specialty_area_id'   => 'required|integer',
            'status'        => 'required|in:DRAFT,PUBLISHED',
            // 'file'        => 'required',
            'filename'        => 'required',
        ];

        if($this->get('image'))
            $rules = array_merge($rules, ['image' => 'required|mimes:jpg,jpeg,png']);

        if($this->get('filename'))
            $rules = array_merge($rules, ['filename' => 'required|mimes:doc,pdf,docx,zip']);

        return $rules;
    }
}
