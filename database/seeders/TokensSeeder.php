<?php

namespace Database\Seeders;

use App\Models\Tokens;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminUser = [ 'name'=>'team','description'=>'Name of the team'];
        Tokens::create($adminUser);
    }
}
