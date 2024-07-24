<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        //1 Klojen
        //2 Blimbing
        //3 Lowokwaru
        //4 Sukun  
        //5 Kedungkandang

        $kelurahans = [
            ['nama' => 'Klojen', 'kecamatan_id' => 1],
            ['nama' => 'Rampal Celaket', 'kecamatan_id' => 1],
            ['nama' => 'Oro-Oro Dowo', 'kecamatan_id' => 1],
            ['nama' => 'Samaan', 'kecamatan_id' => 1],
            ['nama' => 'Penanggungan', 'kecamatan_id' => 1],
            ['nama' => 'Gadingkasri', 'kecamatan_id' => 1],
            ['nama' => 'Bareng', 'kecamatan_id' => 1],
            ['nama' => 'Kasin', 'kecamatan_id' => 1],
            ['nama' => 'Sukoharjo', 'kecamatan_id' => 1],
            ['nama' => 'Kauman', 'kecamatan_id' => 1],
            ['nama' => 'Kiduldalem', 'kecamatan_id' => 1],
            ['nama' => 'Kesatrian', 'kecamatan_id' => 2],
            ['nama' => 'Polehan', 'kecamatan_id' => 2],
            ['nama' => 'Purwantoro', 'kecamatan_id' => 2],
            ['nama' => 'Bunulrejo', 'kecamatan_id' => 2],
            ['nama' => 'Pandanwangi', 'kecamatan_id' => 2],
            ['nama' => 'Blimbing', 'kecamatan_id' => 2],
            ['nama' => 'Purwodadi', 'kecamatan_id' => 2],
            ['nama' => 'Arjosari', 'kecamatan_id' => 2],
            ['nama' => 'Bale Arjosari', 'kecamatan_id' => 2],
            ['nama' => 'Jodipan', 'kecamatan_id' => 2],
            ['nama' => 'Polowijen', 'kecamatan_id' => 2],
            ['nama' => 'Jatimulyo', 'kecamatan_id' => 3],
            ['nama' => 'Lowokwaru', 'kecamatan_id' => 3],
            ['nama' => 'Tulusrejo', 'kecamatan_id' => 3],
            ['nama' => 'Mojolanggu', 'kecamatan_id' => 3],
            ['nama' => 'Tunjungsekar', 'kecamatan_id' => 3],
            ['nama' => 'Tasikmadu', 'kecamatan_id' => 3],
            ['nama' => 'Tunggulwulung', 'kecamatan_id' => 3],
            ['nama' => 'Dinoyo', 'kecamatan_id' => 3],
            ['nama' => 'Merjosari', 'kecamatan_id' => 3],
            ['nama' => 'Tlogomas', 'kecamatan_id' => 3],
            ['nama' => 'Sumbersari', 'kecamatan_id' => 3],
            ['nama' => 'Ketawanggede', 'kecamatan_id' => 3],
            ['nama' => 'Bandulan', 'kecamatan_id' => 4],
            ['nama' => 'Karangbesuki', 'kecamatan_id' => 4],
            ['nama' => 'Pisangcandi', 'kecamatan_id' => 4],
            ['nama' => 'Mulyorejo', 'kecamatan_id' => 4],
            ['nama' => 'Sukun', 'kecamatan_id' => 4],
            ['nama' => 'Tanjungrejo', 'kecamatan_id' => 4],
            ['nama' => 'Bakalankrajan', 'kecamatan_id' => 4],
            ['nama' => 'Bandungrejosari', 'kecamatan_id' => 4],
            ['nama' => 'Ciptomulyo', 'kecamatan_id' => 4],
            ['nama' => 'Gadang', 'kecamatan_id' => 4],
            ['nama' => 'Kebonsari', 'kecamatan_id' => 4],
            ['nama' => 'Kebonsari', 'kecamatan_id' => 4],
            ['nama' => 'Arjowinangun', 'kecamatan_id' => 5],
            ['nama' => 'Tlogowaru', 'kecamatan_id' => 5],
            ['nama' => 'Mergosono', 'kecamatan_id' => 5],
            ['nama' => 'Bumiayu', 'kecamatan_id' => 5],
            ['nama' => 'Wonokoyo', 'kecamatan_id' => 5],
            ['nama' => 'Buring', 'kecamatan_id' => 5],
            ['nama' => 'Kotalama', 'kecamatan_id' => 5],
            ['nama' => 'Kedungkandang', 'kecamatan_id' => 5],
            ['nama' => 'Cemorokandang', 'kecamatan_id' => 5],
            ['nama' => 'Lesanpuro', 'kecamatan_id' => 5],
            ['nama' => 'Madyopuro', 'kecamatan_id' => 5],
            ['nama' => 'Sawojajar', 'kecamatan_id' => 5],
        ];

        DB::table('kelurahans')->insert($kelurahans);
    }
}
