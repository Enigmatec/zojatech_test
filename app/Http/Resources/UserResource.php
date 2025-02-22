<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $organizationUser = $this->whenLoaded('organizationUser');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $organizationUser->role,
            'job_description' => $organizationUser->job_description
        ];
    }
}
