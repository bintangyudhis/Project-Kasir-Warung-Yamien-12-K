<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'username' => 'admin',
            'fullname' => 'Administrator',
            'email' => 'admin@metime.web.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);


        User::create([
            'username' => 'kasir',
            'fullname' => 'Kasir MeTime',
            'email' => 'kasir@metime.web.id',
            'password' => bcrypt('password'),
            'role' => 'cashier',
        ]);
    }
}
