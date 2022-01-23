<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Permission;
use App\Models\Role;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

Role::create(
    [
    'name'=>'admin',
    'display_name'=>'admin',
    'description'=>'admin',
    ]

);
Role::create(
   
    [
    'name'=>'admission',
    'display_name'=>'admission',
    'description'=>'admission',
    ]

);
Role::create(
   
    [
    'name'=>'visa',
    'display_name'=>'visa',
    'description'=>'visa',
    ]
    

);
Role::create(
   
    [
        'name'=>'finance',
        'display_name'=>'finance',
        'description'=>'finance',
        ]
    

);


        $admin = User::create([
            "name" =>"admin",
            "email" =>"admin@admin.com",
            "password" => bcrypt("123"),
            ]);
            $admin->attachRole('admin');

    }
}
