<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            for ($j = 0; $j < 3; $j++) {
                Link::create([
                    'project_id'=> $i,
                    'url' => fake()->name(),
                    'description' => fake()->name(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
