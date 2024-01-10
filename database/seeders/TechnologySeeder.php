<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Technology::create(['name' => 'Tecnologia 1']);
        Technology::create(['name' => 'Tecnologia 2']);
        Technology::create(['name' => 'Tecnologia 3']);
    }
}
