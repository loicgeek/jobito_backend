<?php

use App\Models\JobType;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class JobTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobType1 = New JobType();
        $jobType1->id= Uuid::uuid();
        $jobType1->name="Stage";
        $jobType1->save();

        $jobType1 = New JobType();
        $jobType1->id= Uuid::uuid();
        $jobType1->name="Temps Plein";
        $jobType1->save();

        $jobType1 = New JobType();
        $jobType1->id= Uuid::uuid();
        $jobType1->name="Temps Partiel";
        $jobType1->save();

    }
}
