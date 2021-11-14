<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datas')->insert([
            'nip' => 112100001,
            'full_name' => 'Arif Hidayat'
        ]);
    }
}
