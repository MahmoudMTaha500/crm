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
        $salesman= \App\SalesMan::get();

        for ($x=1; $x <= 40 ; $x++) {

            Visa::create([
                'student_id'=>rand(1,20) ,
                'date'=>date('Y-M-D') ,
                'type_id'=>rand(1,2) ,
                "salesman_id" =>$salesman[0]['id'],
                'fees'=>rand(1,200) ,
                'country_id'=>rand(1,6) ,
                'bank_id'=>rand(1,6) ,
                'transfer_bank_id'=>rand(1,6) ,
                "other" => "text",
                "payment" => "Sat Acc",
                "status" => "new",
                'creator'=>"admin",

            ]);
        }
    }
}
