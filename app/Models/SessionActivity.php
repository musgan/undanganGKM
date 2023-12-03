<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionActivity extends Model
{
    use HasFactory;

    protected $fillable = ['title','tagline','location','sub_location','contribution_value','contribution_text'
        ,'contribution_description','map_location','date_start','date_end','time_start','time_end'];
}
