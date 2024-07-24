<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Yusuf Saefullah Tri Nugroho',
                'email' => 'webgis@fasum.com',
                'password' => bcrypt('skripsiasik'),
            ]
        ];

        DB::table('users')->insert($users);
    }
}
