<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::truncate();

        $projectsNames = [
            'Progetto 1',
            'Progetto 2',
            'Progetto 3',
            'Progetto 4',
        ];

        foreach ( $projectsNames as $name ) {
            Project::create([
                'type_id' => collect([1,2,3])->random(),
                'name' => $name,
                'image_path' => fake()->imageUrl,
                'description' => fake()->realText
            ]);
        }
    }
}
