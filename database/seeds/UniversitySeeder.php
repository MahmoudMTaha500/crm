<?php

use Illuminate\Database\Seeder;
use App\University;
use App\City;

class UniversitySeeder extends Seeder
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
            University::create([
                "name" => 'University'.$x,
                "country_id" => $country_id,
                "city_id" => $city_id,
                // "status" =>"hold",
                // "text_note" =>"note",
                "creator" =>"admin",
                // "academic_year" =>"half year",
            ]);

        }
    }
}
