<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeNames = [
            'Tipo 1',
            'Tipo 2',
            'Tipo 3'
        ];

        foreach ( $typeNames as $name ) {
            Type::create([
                'name' => $name
            ]);
        }
    }
}
