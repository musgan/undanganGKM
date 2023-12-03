<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = ['key','type','name','phone_number','total_member','will_attend'
        ,'total_paid','session_activity_id','paid_off'];

    public function sessionActivity(){
        return $this->belongsTo(SessionActivity::class,"session_activity_id","id");
    }
}
