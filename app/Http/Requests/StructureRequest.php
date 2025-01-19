<?php

namespace App\Http\Requests;

use App\Enums\StructureEnum;
use App\Models\OrganizationUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StructureRequest extends FormRequest
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
            'structures' => ['bail', 'required', 'array'],
            'structures.*.title' => ['bail', 'required', Rule::in(StructureEnum::cases())],
            'structures.*.line_manager_id' => ['bail', 'nullable', Rule::exists(OrganizationUser::class, 'id')]
        ];
    }
}
