<?php

namespace App\Models;


class Job extends MyModel
{

    protected $fillable = ['title','description','salary','deadline','city_id','job_type_id'];
    protected $casts=[
      'deadline'=>'datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(JobType::class);
    }

    public function cover(){
        return $this->morphOne(Image::class,'imageable');
    }
}
