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
        $this->call(EmployeeSeeder::class);

        $this->call(PlaceOfStudySeeder::class);
        $this->call(StudentSeeder::class);
//        $this->call(SalesManSeeder::class);
//        $this->call(StudentRequestSeeder::class);
        $this->call(VisaSeeder::class);
        // $this->call(LaratrustSeeder::class);
        $this->call(AgencySeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(EnglishSchoolSeeder::class);
        $this->call(UniversityRequestsSeeder::class);
        $this->call(MarkterSeeder::class);
        $this->call(EnglishSchoolRequestsSeeder::class);
        $this->call(VisaTypeSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(FinanceUniversitySeeder::class);
        $this->call(EnglishSchoolFinanceSeeder::class);
    }
}
