<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //my seeder
        User::create([
            'name' => 'John wick',
            'email' => 'john@wick.com',
            'password' => '1234',
        ]);

        User::create([
            'name' => 'Arrr',
            'email' => 'ar@gmail.com',
            'password' => '2123',
        ]);
    }
}
