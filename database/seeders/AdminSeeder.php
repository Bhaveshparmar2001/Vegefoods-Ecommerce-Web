<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin records

        DB::table('admins')->insert([
             'name' => "Admin",
             'email' => "admin@gmail.com",
             'phone' => "9969886996",
             'role' => "super-admin",
             'password' => hash::make('123456789'),
             'status' => 'Active',
        ]);
    }
}
