<?php

namespace App\Http\Controllers;

use App\Helper\GenerateHelper;
use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function confirmationOfAttendance(ParticipantRequest $request){

        try{
            DB::beginTransaction();
            $dataToSave = $request->all();
            $dataToSave["type"] = "UMUM";
            $dataToSave["key"] = GenerateHelper::generateKeyParticipant($request->session_activity_id);
            Participant::create($dataToSave);
            DB::commit();
            return response()->json([
                'status'    => 'wait'
            ]);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'message'    => $e->getMessage()
            ], 500);
        }
    }
}
