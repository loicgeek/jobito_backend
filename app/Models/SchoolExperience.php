<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolExperience extends Model
{
    function userProfile(){
        return $this->belongsTo(UserProfile::class);
    }
}
