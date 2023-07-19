<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Event\EventRequest;
use App\Models\Event;
use App\Models\User;
use App\Services\Event\EventService;
use App\Http\Resources\Event\EventResource;
use App\Http\Resources\Event\EventCollection;



class EventController extends Controller
{


    public function __construct(
        protected EventService $eventService
    ){}



    public function store(EventRequest $request)
    {
        $event=$this->eventService->store($request);
        return new EventResource($event);
    }

    // Organizers can only see their own event
    public function show($id)
    {
        $event=$this->eventService->show($id);
        return new EventResource($event);
    }

    // Organizers can only update their own event
    public function update(EventRequest $request, $id)
    {
        $event=$this->eventService->update($request, $id);
        return new EventResource($event);
    }

    // Organizers can only delete their own event
    public function destroy($id)
    {
        $event=$this->eventService->destroy($id);
        return new EventResource($event);
    }

    // Organizers can only see their own events
    public function myevent()
    {
        $events=$this->eventService->myevent();
        return new EventCollection($events);
    }



    public function events()
    {
        $events=$this->eventService->events();
        return new EventCollection($events);
    }

}
