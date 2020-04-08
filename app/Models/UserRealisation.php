<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRealisation extends Model
{
    function userProfile(){
        return $this->belongsTo(UserProfile::class);
    }

    /**
     * Get all of the realisation's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
