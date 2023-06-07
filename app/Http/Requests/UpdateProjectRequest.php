<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'max:150', 'min:5',  Rule::unique('projects')->ignore($this->project)],
            'content' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id']
        ];
    }


         /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages() {
        return [
            'title.required' => 'Il campo "Title" è richiesto e deve essere lungo almeno 5 caratteri',
            'title.min' => 'Il campo "Title" deve essere lungo almeno 5 caratteri',
            'title.max' => 'Il campo "Title" non deve superare 150 caratteri',
        ];
    }
}
