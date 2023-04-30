<?php

use Illuminate\Database\Seeder;
use App\Place_of_study;
use App\City;

class PlaceOfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        for($x=0 ; $x<=30; $x++){
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            Place_of_study::create([
                "name" => 'place'.$x,
                "country_id" => $country_id,
                "city_id" => $city_id,
                "creator" =>"admin",

                "type_id" => rand(1 , 2),
            ]);

        }

    }
}
