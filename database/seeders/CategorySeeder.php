<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['nama' => 'Sarana Transportasi'],
            ['nama' => 'Rumah Sakit'],
            ['nama' => 'Taman Kota'],
            ['nama' => 'Pusat Perbelanjaan'],
            ['nama' => 'Polsek'],
            ['nama' => 'Kantor Pemerintahan'],
            ['nama' => 'Perguruan Tinggi']
        ];

        DB::table('categories')->insert($categories);
    }
}
