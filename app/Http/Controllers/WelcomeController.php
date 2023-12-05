<?php

namespace App\Http\Controllers;

use App\Helper\GenerateHelper;
use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;
use App\Models\SessionActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Exception;

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
            }if(($participant->paid_off === 0 || $participant->paid_off === null) && $participant->will_attend){
                $status = "wait";
            }
        }

        return view("welcome", compact('participant','session_activity', 'status'));
    }

    public function confirmationOfAttendance(ParticipantRequest $request){

        try{
            DB::beginTransaction();
            $result = null;
            if($request->key){
                $result = $this->updateConfirmation($request);
            }else{
                $result = $this->insertNewConfirmation($request);
            }
            $request->session()->flash('show_notif_status', 'Task was successful!');
            DB::commit();
            return response()->json([
                'data'    => $result
            ]);
        }catch (Exception $e){
            DB::rollBack();
            return response()->json([
                'message'    => $e->getMessage()
            ], 400);
        }
    }

    function updateConfirmation(ParticipantRequest $request){
        $data = Participant::where('key',$request->key)->first();
        $data->will_attend = 1;
        if($data == null)
            throw new Exception("link undangan anda salah",500);
        $data->update($request->all());

        return Participant::where('key',$request->key)->first();
    }

    function insertNewConfirmation(ParticipantRequest $request){
        $dataToSave = $request->all();
        $dataToSave["will_attend"] = 1;
        $dataToSave["type"] = "umum";
        $dataToSave["key"] = GenerateHelper::generateKeyParticipant($request->session_activity_id);
        return Participant::create($dataToSave);
    }
}
