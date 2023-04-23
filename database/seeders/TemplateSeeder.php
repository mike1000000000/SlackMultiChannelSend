<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultTemplate = [ 'name'=>'Default Template','text'=>'Hello, [teamname]!' ];
        Template::create($defaultTemplate);
    }
}
