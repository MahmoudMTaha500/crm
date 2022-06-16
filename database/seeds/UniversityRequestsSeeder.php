<?php

use Illuminate\Database\Seeder;
use App\universityRequests;

class UniversityRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 70 ; $x++) { 
           
            universityRequests::create([
                "student_id" => rand(1,70),
                "university_id" => rand(1,20),
                "status" => "hold",
                "text_note" => "",
                "start_date" => time(),
                "salesman_id" => rand(1,10),
                "markter_id" => rand(1,10),
                "agency_id" => rand(1,5),
               
                "creator" =>"admin",

                
            ]);
        }
    }
}
