<?php
namespace App\Services\Event;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class EventService{

    public function authEventControl()
    {
        if(!Gate::allows('isAdmin') && !Gate::allows('isOrganizer')){
            abort(403);
        }
    }

    public function store($request){
        self::authEventControl();
        $organizerId=auth()->user()->id;
        $event=Event::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'speaker'=>$request->speaker,
            'event_date'=>$request->event_date,
            'location'=>$request->location,
            'event_type'=>$request->event_type,
        ]);

        $event->organizers()->attach($organizerId);
        return $event;
    }

    public function myevent(){
        self::authEventControl();
        $organizerId=auth()->user()->id;
        $events=Event::whereHas('organizers', function($query) use($organizerId){
            $query->where('user_id', $organizerId);
        })->with('organizers')->orderBy('created_at', 'desc')->get();
        return $events;
    }


    public function show($id){
        self::authEventControl();
        $event=Event::with('organizers')->where('id',$id)->whereHas('organizers', function($query){
            $query->where('user_id', auth()->user()->id);
        })->firstOrFail();
        return $event;
    }

    public function update($request,$id){
        self::authEventControl();
        $event=Event::where('id',$id)->whereHas('organizers', function($query){
            $query->where('user_id', auth()->user()->id);
        })->firstOrFail();
        $event->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'speaker'=>$request->speaker,
            'event_date'=>$request->event_date,
            'location'=>$request->location,
            'event_type'=>$request->event_type,
        ]);
        return $event;
    }

    public function destroy($id){
        self::authEventControl();
        $event=Event::where('id',$id)->whereHas('organizers', function($query){
            $query->where('user_id', auth()->user()->id);
        })->firstOrFail();
        $event->organizers()->detach();
        $event->delete();
        return $event;
    }

    public function events(){
        $events=Event::with('organizers')->orderBy('created_at', 'desc')->get();
        return $events;
    }







}





?>
