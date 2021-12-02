<?php

use Illuminate\Database\Seeder;
use App\Type_of_place;

class TypeOfPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type_of_place::create(['name'=>'institute']);
        Type_of_place::create(['name'=>'university']);
    }
}
