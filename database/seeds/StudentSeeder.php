<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\City;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) { 
            $city_id = rand(1,30);
            $country_id = City::where('id' , $city_id)->get('country_id')[0]->country_id;
            Student::create([
                "name" => ' studen Name'.$x,
                "phone" => '0123456'.$x,
                "email" => 'student@app.com'.$x,
                "address" => 'Student Address '.$x,
               
                "creator_id" => 1,
                "to_visa" => 1,
            ]);
        }
    }
}
