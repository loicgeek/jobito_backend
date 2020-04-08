<?php

namespace App\Models;

class EnterpriseProfile extends MyModel
{

    public function user(){
        return $this->belongsTo(User::class);
    }

}
