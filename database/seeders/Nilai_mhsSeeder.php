<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Nilai_mhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nilai_mhs')->insert(
            [
                [
                    'nama' => 'andrea',
                    'nim' => '12301',
                    'jurusan_id' => 1,
                    'kota' => 'jombang',
                    'provinsi' => 'jombang',
                    'matakuliah_id' => 1
                ],
                [
                    'nama' => 'agra',
                    'nim' => '12302',
                    'jurusan_id' => 2,
                    'kota' => 'bandung',
                    'provinsi' => 'jawa barat',
                    'matakuliah_id' => 2
                ],
            ]);
    }
}
