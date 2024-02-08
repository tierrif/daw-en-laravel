<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (['TWAM', 'DAW'] as $uc) {
            DB::table('uc')->insert([
                'name' => $uc
            ]);
        }
    }
}
