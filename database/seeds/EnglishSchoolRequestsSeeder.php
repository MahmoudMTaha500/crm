<?php

use Illuminate\Database\Seeder;
use App\EnglishSchoolRequests;
class EnglishSchoolRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salesman= \App\SalesMan::get();
        for ($x=1; $x <= 70 ; $x++) {

            EnglishSchoolRequests::create([
                "student_id" => rand(1,70),
                "englishSchool_id" => rand(1,20),
                "status" => "hold",
                "text_note" => "",
                "duration" => rand(1,6),
                "start_date" => time(),
                "end_date" => time(),
                "salesman_id" =>$salesman[0]['id'],
                "markter_id" => rand(1,9),
                // "agency_id" => rand(1,5),
               "course"=>'Degree',
                "fees" =>10,
                "creator" =>"admin",
                "residence" =>"Not Required",


            ]);
        }
    }
}
