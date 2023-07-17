<?php

namespace App\Http\Resources\Enum;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EnumCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->mapWithKeys(fn ($item): array => [
                class_basename($item->resource)   => $item->toArray($request)
            ])
        ];
    }
}
