<?php
use App\Markter;
use Illuminate\Database\Seeder;

class MarkterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @preturn void
     */
    public function run()
    {
        for($x=0 ;$x<=10; $x++){

            Markter::create([
                'name'=>"Markter".$x,
                'phone'=>"12544984".$x,
                "creator" =>"admin",

            ]);
         }
    }
}
