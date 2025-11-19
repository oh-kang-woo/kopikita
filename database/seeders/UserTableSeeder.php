<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [

            [
                'name' => 'Latte Lover',
                'email' => 'latte@coffee.com',
                'password' => Hash::make('latte123'),
                'role' => 'user',
            ],
            [
                'name' => 'Espresso King',
                'email' => 'espresso@coffee.com',
                'password' => Hash::make('espresso123'),
                'role' => 'user',
            ],
            [
                'name' => 'Cappuccino Queen',
                'email' => 'cappuccino@coffee.com',
                'password' => Hash::make('cap12345'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
