<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collaborators')->insert(
            [
                [
                    'project_id'    => 1,
                    'user_id'       => 1,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'project_id'    => 1,
                    'user_id'       => 2,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'project_id'    => 1,
                    'user_id'       => 3,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'project_id'    => 2,
                    'user_id'       => 4,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'project_id'    => 2,
                    'user_id'       => 5,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
                [
                    'project_id'    => 2,
                    'user_id'       => 6,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ],
            ]
        );
    }
}
