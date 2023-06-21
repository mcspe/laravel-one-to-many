<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:50',
            'summary' => 'required|min:3',
            'languages' => 'required|min:1|max:255',
            'link' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
      return [
        'title.required' => 'Title field is mandatory',
        'title.min' => 'Title field must have minimum :min characters',
        'title.max' => 'Title field must have maximum :max characters',
        'summary.required' => 'Summary field is mandatory',
        'summary.min' => 'Summary field must have minimum :min characters',
        'languages.required' => 'Languages field is mandatory',
        'languages.min' => 'Languages field must have minimum :min characters',
        'languages.max' => 'Languages field must have maximum :max characters',
        'link.required' => 'Link field is mandatory',
        'link.min' => 'Link field must have minimum :min characters',
        'link.max' => 'Link field must have maximum :max characters'
      ];
    }
}
