<?php

namespace App\Models;

class Certification extends MyModel
{
    function userProfile(){
        return $this->belongsTo(UserProfile::class);
    }
}
