<?php

use Illuminate\Database\Seeder;
use App\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 30; $x++) {
            City::create([
                "name" => 'London'.$x,
                "country_id" => rand(1,10),
                "creator" =>"admin",

            ]);
        }
    }
}
