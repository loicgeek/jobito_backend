<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function experiences(){
        return $this->hasMany(WorkExperience::class);
    }

    public function schools(){
        return $this->hasMany(SchoolExperience::class);
    }

    public function certifications(){
        return $this->hasMany(Certification::class);
    }

    public function realisations(){
        return $this->hasMany(UserRealisation::class);
    }



}
