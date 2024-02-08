<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('student')->insert([
                'number' => mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax() * 20000,
                'name' => fake()->name()
            ]);
        }
    }
}
