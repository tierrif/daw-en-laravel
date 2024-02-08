<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UCClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 2; $j++) {
                DB::table('class')->insert([
                    'uc_id' => $j,
                    'name' => strval($i),
                    'state' => 1,
                    'timestamp' => '2023-11-21',
                    'created_at' => date('y-m-d'),
                ]);
            }
        }
    }
}
