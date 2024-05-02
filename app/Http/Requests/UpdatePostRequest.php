<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => [ Rule::unique('posts')->ignore($this->id),
            'required',
            'min:3']
            ,
            'body' => 'required|min:10',

            ];
    }

    public function messages():  array  {
        return [
            'title.min' => 'The title is less than 3 charachters',
            'title.uniqe' => 'This title is taken',
            'body.min' => 'The body is should be more than 10 charachters'
        ];
    }
}
