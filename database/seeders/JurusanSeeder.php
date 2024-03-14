<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'Pengembangan Perangkat Lunak',
            ],
            [
                'nama' => 'Digital marketing',
            ],
            [
                'nama' => 'Hardware Engineering',
            ],
            [
                'nama' => 'Pengelolaan Sistem Jaringan',
            ],
            // Add more departments as needed
        ];
        DB::table('jurusan')->insert($data);
    }
}
