<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatans = [
            ['nama' => 'Klojen'],           //1
            ['nama' => 'Blimbing'],         //2
            ['nama' => 'Lowokwaru'],        //3
            ['nama' => 'Sukun'],            //4
            ['nama' => 'Kedungkandang']     //5
        ];

        DB::table('kecamatans')->insert($kecamatans);
    }
}
