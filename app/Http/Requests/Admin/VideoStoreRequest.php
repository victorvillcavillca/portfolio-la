<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
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
            'slug'          => 'required|unique:resources,slug',
            'order'         => 'required',
            'url'         => 'required',
            'user_id'       => 'required|integer',
            'video_category_id' => 'required|integer',
            'status'        => 'required|in:DRAFT,PUBLISHED',
            // 'file'      => 'required',
        ];

        // if($this->get('file'))
        //     $rules = array_merge($rules, ['file' => 'required|file|size:20480|mimes:zip']);

        return $rules;
    }
}
