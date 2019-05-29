<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoUpdateRequest extends FormRequest
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
            // 'slug'          => 'required|unique:resources,slug,' . $this->resource,
            'order'          => 'required',
            'url'          => 'required',
            'user_id'       => 'required|integer',
            'video_category_id'   => 'required|integer',
            'status'        => 'required|in:DRAFT,PUBLISHED',
        ];


        if($this->get('filename'))
            $rules = array_merge($rules, ['filename' => 'mimes:zip']);

        return $rules;
    }
}
