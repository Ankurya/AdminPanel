<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequst extends FormRequest
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
            'title' => 'required',
            'category' => 'required',
            'description' =>'required',
            'profile_pic' => 'required|mimes:jpeg,png|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'category.required' => 'The category field is required.',
            'description.required' => 'The description field is required.',

            'profile_pic.required' => 'The image field is required.',
            'profile_pic.mimes' => 'The image extension should be jpeg & png.',
            'profile_pic.max' => 'The image size is greater than 1MB.',
          ];
    }
}
