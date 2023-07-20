<?php

namespace App\Services\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;



class ParticipantService {

public function storeOrUpdate($request){
    $participant = Participant::where('user_id', auth()->user()->id)
            ->where('event_id', $request->event_id)
            ->first();
        if ($participant) {
        if($request->status && $request->comment){
            $participant->update([
                'status' => $request->status,
                'comment' => $request->comment,
            ]);
        }else{
            return $participant;
        }
        } else {
            $participant=Participant::create([
                'user_id' => auth()->user()->id,
                'event_id' => $request->event_id,
            ]);
        }

        return $participant;
}

public function myEvent(){
    $events = Participant::where('user_id', auth()->user()->id)
            ->with('event', 'event.organizers')
            ->get();

        if ($events) {
            return $events;
        } else {
            return $events['message'] = 'No event found';

        }

}




}


?>
