<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->id)],
            'password' => ['required', 'min:8'],
            'is_admin' => ['required'],
            'is_active' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'fisrt name is required',
            'last_name.required' => 'last name is required',
            'username.required' => 'username is required',
            'email.required' => 'email is required',
            'password.required' => 'password is required',
            'is_admin.required' => 'role is required',
            'is_active.required' => 'status is required',
            'email.email' => 'error type',
            'password.min' => 'password at least 8 characters',
            'username.unique' => 'username is exist',
            'email.unique' => 'email is exist',
        ];
    }
}
