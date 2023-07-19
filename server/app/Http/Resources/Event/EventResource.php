<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

    $eventData = parent::toArray($request);
    $eventData['organizers'] = $this->organizers->map(function ($organizer) {
        return [
            'id' => $organizer->id,
            'name' => $organizer->name,
            'email' => $organizer->email,

        ];
    });

    return $eventData;

    }
}
