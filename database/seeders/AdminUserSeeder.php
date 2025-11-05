<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kokulife.com.tr'],
            [
                'name' => 'Yönetici',
                'password' => Hash::make('koku*life123.'), // change to a secure password!
                //'is_admin' => true, // optional if you add is_admin column
            ]
        );
    }
}
