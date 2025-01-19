<?php

namespace App\Http\Requests;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class UserRequest extends FormRequest
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
            'name' => ['bail', 'required', 'max:255'],
            'email' => ['bail', 'required', 'email:filter', Rule::unique(User::class)],
            'password' => ['bail', 'required', 'confirmed'],
            'role' => ['bail', 'required', new Enum(RoleEnum::class)],
            'job_description' => ['bail', 'nullable']
        ];
    }

    function messages()
    {
        return [
            'email.unique' => 'email address has already been taken'
        ];
    }
}
