<?php

use Illuminate\Database\Seeder;
use App\Country;
class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            Country::create([
                "name" => 'England'.$x,
                "creator" =>"admin",


            ]);
        }
    }
}
