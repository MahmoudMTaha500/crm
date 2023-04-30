<?php

use Illuminate\Database\Seeder;
use App\StudentRequest;
class StudentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) { 
           
            StudentRequest::create([
                "student_id" => rand(1,70),
                "study_place_id" => rand(1,20),
                "status" => 0,
                "salesman_id" => rand(1,10),
               
                "creator" =>"admin",

                
            ]);
        }
    }
}
