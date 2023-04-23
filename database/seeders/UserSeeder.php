<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $adminUser = [
            'name' => env('APP_ADMIN_NAME'),
            'password' => Hash::make(env('APP_ADMIN_PASSWORD')),
            'email' => env('APP_ADMIN_EMAIL'),
        ];
        User::create($adminUser);
    }
}
