<?php
use App\VisaType;
use Illuminate\Database\Seeder;

class VisaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 1; $x++) {
            VisaType::create([
                "name" => 'name'.$x,
                "type" => 'UK'.$x,
                'country_id'=>rand(1,6) ,
                "creator" =>"admin",


            ]);
        }
    }
}
