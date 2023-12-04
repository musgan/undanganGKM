<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    //
    public function index($key = ""): View{
        $participant = Participant::where('key', $key)->first();
        $session_activity = $participant?->sessionActivity??null;
        $status = null;

        if($session_activity === null){
            $participant = null;
            $session_activity = SessionActivity::findOrFail(1);
        }

        if($participant !==null){
            if($participant->paid_off === 1 && $participant->will_attend){
                $status = "ok";
            }if($participant->paid_off === 0 && $participant->will_attend){
                $status = "wait";
            }
        }

        return view("welcome", compact('participant','session_activity', 'status'));
    }
}
