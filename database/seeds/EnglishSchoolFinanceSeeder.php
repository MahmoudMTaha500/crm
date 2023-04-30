<?php

use Illuminate\Database\Seeder;
use App\EnglishSchoolFinance;
class EnglishSchoolFinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 30 ; $x++) { 
           
            EnglishSchoolFinance::create([
                "request_id" => rand(1,30),
                "total" => rand(10000,20000),
                "pay" => rand(1000,5000),
                "remain" => rand(5000,9000),



                "commission_percentage" => 0,
                "commission_total" => 0,
                "commission_received" => 0,
                "commission_remain" => 0,
                "student_period" => ' ',

                "status_paied" => 'Not paid yet',
                "status_followed" => 'Not yet followed',
                "english_school_note" => 'School note',
                "sat_note" => 'sat note',
                "creator" =>"admin",

                
            ]);
        }
    }
}
