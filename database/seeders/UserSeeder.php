<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('@3Bcode'),
                'role' => 'admin',
            ],
            [
                'name' => 'Pemilik',
                'email' => 'pemilik@gmail.com',
                'password' => bcrypt('@3Bcode'),
                'role' => 'pemilik',
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
