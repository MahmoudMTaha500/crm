<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TypeOfPlaceSeeder::class);

        $this->call(PlaceOfStudySeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(SalesManSeeder::class);
        $this->call(StudentRequestSeeder::class);
        $this->call(VisaSeeder::class);
        // $this->call(LaratrustSeeder::class);
        $this->call(EmployeeSeeder::class);
    }
}
