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
    'name'=>'employee',
    'display_name'=>'employee',
    'description'=>'employee',
    ]

);



        $admin = User::create([
            "name" =>"admin",
            "email" =>"admin@admin.com",
            "password" => bcrypt("123"),
                "creator" => "admin",

            ]);
            $admin->attachRole('admin');

        $selsman = User::create([
            "name" =>"ahmed salesman",
            "email" =>"salesman@sat.com",
            "password" => bcrypt("123"),
            "creator" => "admin",
            "department" => "salesman",

        ]);
            // country permission
        $permission = Permission::create(
            [
                'name' => 'create-country',
                'display_name' => 'create country', // optional
                'description' => 'create country', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-country',
            'display_name' => 'show country', // optional
            'description' => 'show country', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-country',
                'display_name' => 'update country', // optional
                'description' => 'update country', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-country',
                'display_name' => 'delete country', // optional
                'description' => 'delete country', // optional
            ]);
        // city permission
        $permission = Permission::create(
            [
                'name' => 'create-city',
                'display_name' => 'create city', // optional
                'description' => 'create city', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-city',
            'display_name' => 'show city', // optional
            'description' => 'show city', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-city',
                'display_name' => 'update city', // optional
                'description' => 'update city', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-city',
                'display_name' => 'delete city', // optional
                'description' => 'delete city', // optional
            ]);
// university permission
        $permission = Permission::create(
            [
                'name' => 'create-requestuniversity',
                'display_name' => 'create request university', // optional
                'description' => 'create request university', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-requestuniversity',
            'display_name' => 'show request university', // optional
            'description' => 'show request university', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-requestuniversity',
                'display_name' => 'update request university', // optional
                'description' => 'update request university', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-requestuniversity',
                'display_name' => 'delete request university', // optional
                'description' => 'delete request university', // optional
            ]);
        // english school permission
        $permission = Permission::create(
            [
                'name' => 'create-requestenglishschool',
                'display_name' => 'create request english school', // optional
                'description' => 'create request english school', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-requestenglishschool',
            'display_name' => 'show request english school', // optional
            'description' => 'show request english school', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-requestenglishschool',
                'display_name' => 'update request english school', // optional
                'description' => 'update request english school', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-requestenglishschool',
                'display_name' => 'delete request english school', // optional
                'description' => 'delete request english school', // optional
            ]);

        // agency permission

        $permission = Permission::create(
            [
                'name' => 'create-agency',
                'display_name' => 'create agency', // optional
                'description' => 'create agency', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-agency',
            'display_name' => 'show agency', // optional
            'description' => 'show agency', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-agency',
                'display_name' => 'update agency', // optional
                'description' => 'update agency', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-agency',
                'display_name' => 'delete agency', // optional
                'description' => 'delete agency', // optional
            ]);
        // visa permission

        $permission = Permission::create(
            [
                'name' => 'create-visa',
                'display_name' => 'create visa', // optional
                'description' => 'create visa', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-visa',
            'display_name' => 'show visa', // optional
            'description' => 'show visa', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-visa',
                'display_name' => 'update visa', // optional
                'description' => 'update visa', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-visa',
                'display_name' => 'delete visa', // optional
                'description' => 'delete visa', // optional
            ]);
        // Finance permission
        $permission = Permission::create(
            [
                'name' => 'create-finance',
                'display_name' => 'create finance', // optional
                'description' => 'create finance', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-finance',
            'display_name' => 'show finance', // optional
            'description' => 'show finance', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-finance',
                'display_name' => 'update finance', // optional
                'description' => 'update finance', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-finance',
                'display_name' => 'delete finance', // optional
                'description' => 'delete finance', // optional
            ]);
        // salesman permission
        $permission = Permission::create(
            [
                'name' => 'create-salesman',
                'display_name' => 'create salesman', // optional
                'description' => 'create salesman', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-salesman',
            'display_name' => 'show salesman', // optional
            'description' => 'show salesman', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-salesman',
                'display_name' => 'update salesman', // optional
                'description' => 'update salesman', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-salesman',
                'display_name' => 'delete salesman', // optional
                'description' => 'delete salesman', // optional
            ]);
        // marketer permission
        $permission = Permission::create(
            [
                'name' => 'create-marketer',
                'display_name' => 'create marketer', // optional
                'description' => 'create marketer', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-marketer',
            'display_name' => 'show marketer', // optional
            'description' => 'show marketer', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-marketer',
                'display_name' => 'update marketer', // optional
                'description' => 'update marketer', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-marketer',
                'display_name' => 'delete marketer', // optional
                'description' => 'delete marketer', // optional
            ]);
        // report permission
        $permission = Permission::create(
            [
                'name' => 'create-report',
                'display_name' => 'create report', // optional
                'description' => 'create report', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-report',
            'display_name' => 'show report', // optional
            'description' => 'show report', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-report',
                'display_name' => 'update report', // optional
                'description' => 'update report', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-report',
                'display_name' => 'delete report', // optional
                'description' => 'delete report', // optional
            ]);

        // report student
        $permission = Permission::create(
            [
                'name' => 'create-student',
                'display_name' => 'create student', // optional
                'description' => 'create student', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-student',
            'display_name' => 'show student', // optional
            'description' => 'show student', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-student',
                'display_name' => 'update student', // optional
                'description' => 'update student', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-student',
                'display_name' => 'delete student', // optional
                'description' => 'delete student', // optional
            ]);
        // report employee
        $permission = Permission::create(
            [
                'name' => 'create-employee',
                'display_name' => 'create employee', // optional
                'description' => 'create employee', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-employee',
            'display_name' => 'show employee', // optional
            'description' => 'show employee', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-employee',
                'display_name' => 'update employee', // optional
                'description' => 'update employee', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-employee',
                'display_name' => 'delete employee', // optional
                'description' => 'delete employee', // optional
            ]);

        // report bank
        $permission = Permission::create(
            [
                'name' => 'create-bank',
                'display_name' => 'create bank', // optional
                'description' => 'create bank', // optional
            ]);

        $permission = Permission::create( [
            'name' => 'show-bank',
            'display_name' => 'show bank', // optional
            'description' => 'show bank', // optional
        ]);
        $permission = Permission::create(
            [
                'name' => 'update-bank',
                'display_name' => 'update bank', // optional
                'description' => 'update bank', // optional
            ]);
        $permission = Permission::create(
            [
                'name' => 'delete-bank',
                'display_name' => 'delete bank', // optional
                'description' => 'delete bank', // optional
            ]);

    }
}
