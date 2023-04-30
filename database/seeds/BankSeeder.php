<?php

use Illuminate\Database\Seeder;
use App\Bank;
class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 10; $x++) {
            Bank::create([
                "name" => 'bank'.$x,
                "creator" =>"admin",


            ]);
        }
    }
}
