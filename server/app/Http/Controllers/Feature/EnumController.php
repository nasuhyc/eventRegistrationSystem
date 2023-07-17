<?php

namespace App\Http\Controllers\Feature;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Enum\EnumCollection;
use App\Other\Enums\EventStatus;
use App\Other\Enums\EventType;
use App\Http\Resources\Enum\EnumResource;


class EnumController extends Controller
{
    public function index(Request $request)
    {
        $enums = [
            EventStatus::class,
            EventType::class,
        ];

        return EnumCollection::make(EnumResource::collection($enums));
    }
}
