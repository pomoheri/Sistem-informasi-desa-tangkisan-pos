<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('12345678'),
            'level_akses' => '0'
        ]);

        User::create([
            'name' => 'kades',
            'email' => 'kades@gmail.com',
            'password'=> bcrypt('12345678'),
            'level_akses' => '1'
        ]);

        User::create([
            'name' => 'warga',
            'email' => 'warga@gmail.com',
            'password'=> bcrypt('12345678'),
            'level_akses' => '2'
        ]);
    }
}
