<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostForm extends Request
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
            "title"    =>    "required|min:5|max:45",
            "content"  =>   "required|min:5|max:500",
            'published_at' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Field title is required!',
            'title.min' => 'Field title > 5 chars',
            'title.min' => 'Field title < 45 chars',
            'content.required' => 'Field content is required!',
            'content.min' => 'Field content > 5 chars',
            'content.min' => 'Field content < 500 chars',
            'published_at.required' => 'Field published_at is required!',
        ];
    }
}
