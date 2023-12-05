<?php

namespace App\Helper;

use App\Models\Participant;
use Illuminate\Support\Str;

class GenerateHelper
{
    public static function generateKeyParticipant($session_activity_id){
        $key = "";
        $listKey = Participant::where('session_activity_id',$session_activity_id)->pluck('key')->toArray();
        $isCheck = true;
        while ($isCheck){
            $key = $session_activity_id.(Str::random(7));
            if(!in_array($key, $listKey)){
                $isCheck = false;
            }
        }
        return $key;
    }
}
