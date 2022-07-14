<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Admistrateur',
            'email' => 'admin@gmail.com',
            'type' => 'admin',
            'password' => Hash::make('admin2022'),
        ]);
    }
}
