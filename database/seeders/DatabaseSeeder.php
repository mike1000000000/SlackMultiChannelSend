<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            TemplateSeeder::class,
            TokensSeeder::class,
            UserSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
