<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
