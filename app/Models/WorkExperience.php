<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{

    function userProfile(){
        return $this->belongsTo(UserProfile::class);
    }


}
