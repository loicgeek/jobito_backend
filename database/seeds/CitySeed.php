<?php

use App\Models\City;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;

class CitySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->id= Uuid::uuid();
        $city->name= "Yaounde";
        $city->save();

        $city = new City();
        $city->id= Uuid::uuid();
        $city->name= "Douala";
        $city->save();

        $city = new City();
        $city->id= Uuid::uuid();
        $city->name= "Bafoussam";
        $city->save();

        $city = new City();
        $city->id= Uuid::uuid();
        $city->name= "Buea";
        $city->save();
    }
}
