<?php

namespace App\Http\Resources\Enum;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use UnitEnum;

class EnumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_map(fn (UnitEnum $unitEnum): array => [
            'name' => $unitEnum->name,
            'value' => $unitEnum->value,
            'label' => $unitEnum->getPrettyName(),
        ], $this->resource::cases());
    }
}
