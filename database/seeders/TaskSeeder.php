<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 3; $j++) {
                Task::create([
                    'project_id' => $i,
                    'name' => fake()->name(),
                    'start_at' => now(),
                    'end_at' => now(),
                    'board' => rand(1,5),
                    'disabled'=> fake()->randomElement([true,false]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
