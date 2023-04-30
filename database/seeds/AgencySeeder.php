<?php

use Illuminate\Database\Seeder;
use App\Agency;
class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 6; $x++) {
            Agency::create([
                "name" => 'Agency'.$x,
                "creator" =>"admin",

            ]);
        }
    }
}
