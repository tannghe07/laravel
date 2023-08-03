<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'image' => ['required'],
            'content' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required',
            'image.required' => 'image is required',
            'content.required' => 'content is required',
        ];
    }
}
