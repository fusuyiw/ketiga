<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        $facilities = [
            // 1 ST
            // 2 rs
            // 3 tk
            // 4 mall
            // 5 Polsek
            // 6 Kp 
            // 7 pT

            [
                'nama' => 'Terminal Arjosari Malang',
                'alamat' => 'Jl. Raden Intan No.1',
                'deskripsi' => 'Terminal bus utama di Malang.',
                'pelayanan' => '24 Jam',
                'lat' => '-7.93312987497527',
                'lng' => '112.659062400828',
                'category_id' => 1, // Sarana Transportasi
                'kelurahan_id' => 1, // Kelurahan A
            ],
            [
                'nama' => 'Terminal Landungsari Malang',
                'alamat' => 'Jl. Raya Tlogomas',
                'deskripsi' => 'Terminal bus utama di Malang.',
                'pelayanan' => '24 Jam',
                'lat' => '-7.92493773443089',
                'lng' => '112.598064487054',
                'category_id' => 1, // Sarana Transportasi
                'kelurahan_id' => 1 // Kelurahan A
            ],
            [
                'nama' => 'RSU Malang',
                'alamat' => 'Jl. Dokter Sutomo No.2',
                'deskripsi' => 'Rumah sakit umum.',
                'pelayanan' => '07.00 - 17.00',
                'lat' => '-7.980324',
                'lng' => '112.630145',
                'category_id' => 2, // Rumah Sakit
                'kelurahan_id' => 1 // Kelurahan A
            ],
            [
                'nama' => 'RSUD Dr. Saiful Anwar',
                'alamat' => 'Jalan Jaksa Agung Suprapto №2',
                'deskripsi' => 'Rumah sakit umum',
                'pelayanan' => '07.00 - 17.00',
                'lat' => '-7.97213895306984',
                'lng' => '112.631785609873',
                'category_id' => 2, // Rumah Sakit
                'kelurahan_id' => 1 // Kelurahan A
            ],
            [
                'nama' => 'Alun-Alun Kota Malang',
                'alamat' => 'Jl. Merdeka No.3',
                'deskripsi' => 'Taman kota yang indah.',
                'pelayanan' => '06.00 - 22.00',
                'lat' => '-7.98236503517033',
                'lng' => '112.63088074477',
                'category_id' => 3, // Taman Kota
                'kelurahan_id' => 2 // Kelurahan B
            ],
            [
                'nama' => 'Mall Malang Town Square',
                'alamat' => 'Jl. Veteran No.5',
                'deskripsi' => 'Pusat perbelanjaan terbesar.',
                'pelayanan' => '10.00 - 22.00',
                'lat' => '-7.964641',
                'lng' => '112.616922',
                'category_id' => 4, // Pusat Perbelanjaan
                'kelurahan_id' => 2 // Kelurahan B
            ],
            [
                'nama' => 'Polsek Lowokwaru',
                'alamat' => 'Jl. MT. Haryono No.413',
                'deskripsi' => 'Kantor Polisi Sektor lowokwaru',
                'pelayanan' => '24 Jam',
                'lat' => '-7.94136835719342',
                'lng' => '112.609321855534',
                'category_id' => 5, // Polsek
                'kelurahan_id' => 1 // Kelurahan A
            ]
        ];

        DB::table('facilities')->insert($facilities);
    }
}
