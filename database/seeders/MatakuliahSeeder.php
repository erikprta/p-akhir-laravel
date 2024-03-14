<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Buat data dummy
        $data = [
            [
                'nama' => 'Pemrograman Web',
                'nilai' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Rekayasa Perangkat Lunak',
                'nilai' => 85,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Web Design',
                'nilai' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jaringan',
                'nilai' => 78,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Pemrograman Mobile',
                'nilai' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel matakuliah
        DB::table('matakuliah')->insert($data);
    }
}
