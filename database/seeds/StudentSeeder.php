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
          
            Student::create([
                "name" => ' studen Name'.$x,
                "phone" => '0123456'.$x,
                "email" => 'student@app.com'.$x,
                "nationality" => 'nationality'.$x,
                "student_type" => 'sponsored',
               
                "creator" =>"admin",

            ]);
        }
    }
}
