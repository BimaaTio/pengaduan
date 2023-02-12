<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'nik' => '0123456789',
            'role' => 'a',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'telp' => '08763345454',
            'password' => Hash::make('12345'),

        ]);
    }
}
