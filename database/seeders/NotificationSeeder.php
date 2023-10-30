<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            for ($j = 1; $j < 3; $j++) {
                Notification::create([
                    'user_id' => $i,
                    'project_id'=> $j,
                    'message' => fake()->paragraph(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
