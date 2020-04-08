<?php

namespace App\Models;


class JobApplication extends MyModel
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}
