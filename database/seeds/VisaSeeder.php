<?php

use Illuminate\Database\Seeder;
use App\Visa;
class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x=1; $x <= 40 ; $x++) { 
          
            Visa::create([
             'student_id'=>rand(1,40),
                "other" => 'describtion for visa '.$x,
                "status" => 0,

                "creator" =>"admin",

            ]);
        }
    }
}
