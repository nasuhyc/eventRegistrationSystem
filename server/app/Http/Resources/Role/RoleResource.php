<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Role\RoleResource;

class RoleResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $roleData=parent::toArray($request);

        return [
            'id' => $roleData['id'],
            'name' => $roleData['name'],
            'created_at' => $roleData['created_at'],
            'updated_at' => $roleData['updated_at'],
        ];
    }

}
