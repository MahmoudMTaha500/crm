<?php

use Illuminate\Database\Seeder;
use App\SalesMan;
class SalesManSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($x=0 ;$x<=10; $x++){

            SalesMan::create([
                'name'=>"SalesMan".$x,
                'phone'=>"12544984".$x,
                "creator" =>"admin",

            ]);
         }
    }
}
