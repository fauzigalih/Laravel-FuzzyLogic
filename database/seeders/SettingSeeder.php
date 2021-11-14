<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'write_low' => 40,
            'write_low_mid' => 65,
            'write_high_mid' => 76,
            'write_high' => 90,

            'practice_low' => 40,
            'practice_low_mid' => 55,
            'practice_high_mid' => 60,
            'practice_high' => 80,

            'graduate_low' => 45,
            'graduate_high_mid' => 60,
            'graduate_low_mid' => 65,
            'graduate_high' => 80,

            'graduate_not' => "Tidak Lulus",
            'graduate_yes' => "Lulus"
        ]);
    }
}
