<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = ['name'=>'My team','user_id'=>'1','personal_team'=>'1'];
        Team::create($team);
    }
}
