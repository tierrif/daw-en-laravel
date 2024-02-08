<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                DB::table('enrollment')->insert([
                    'student_id' => $i,
                    'uc_id' => $j,
                ]);
            }
        }
    }
}
