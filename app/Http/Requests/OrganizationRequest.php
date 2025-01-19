<?php

namespace App\Http\Requests;

use App\Models\Organization;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganizationRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'name' => ['bail', 'required', Rule::unique(Organization::class)],
            'mission_statement' => ['bail', 'required', 'string'],
            'vision_statement' => ['bail', 'required', 'string'],
            'color' => ['bail', 'required', 'string'],
            'address' => ['bail', 'required', 'string'],
        ];
    }
}
