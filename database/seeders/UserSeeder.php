<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'fname' => 'Tony',
        		'lname' => 'Stark',
        		'email' => 'tony@smartdata.com',
        		'password' => bcrypt('harish@smartdata'),
        		'gender' => 'male',
        		'email_verified_at' => Carbon::now(),
        		'role' => 'admin',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'fname' => 'Bruce',
        		'lname' => 'Banner',
        		'email' => 'bruce@smartdata.com',
        		'password' => bcrypt('harish@smartdata'),
        		'gender' => 'male',
        		'email_verified_at' => Carbon::now(),
        		'role' => 'admin',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],
        	[
        		'fname' => 'Perter',
        		'lname' => 'Parker',
        		'email' => 'perter@smartdata.com',
        		'password' => bcrypt('harish@smartdata'),
        		'gender' => 'male',
        		'email_verified_at' => Carbon::now(),
        		'role' => 'user',
        		'created_at' => Carbon::now(),
        		'updated_at' => Carbon::now(),
        	],

        ];

        User::insert($users);
    }
}
