<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;
use App\Services\Participant\ParticipantService;
use App\Http\Resources\Participant\ParticipantResource;
use App\Http\Resources\Participant\ParticipantCollection;
use App\Http\Requests\Participant\ParticipantRequest;


class ParticipantController extends Controller
{


    public function __construct(protected ParticipantService $participantService)
    {
    }

    public function storeOrUpdate(ParticipantRequest $request)
    {
        $participant=$this->participantService->storeOrUpdate($request);
        return new ParticipantResource($participant);
    }

    public function myEvent()
    {
        $participants=$this->participantService->myEvent();
        return new ParticipantCollection($participants);
    }


}
