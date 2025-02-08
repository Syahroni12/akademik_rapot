<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            [
                'kd_mapel' => 'MTK01',
                'mapel' => 'Matematika',
                'id_kelas' => 1, // Sesuaikan dengan id kelas yang ada
                'semester' => 'ganjil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kd_mapel' => 'BINDO',
                'mapel' => 'Bahasa Indonesia',
                'id_kelas' => 1, // Sesuaikan dengan id kelas yang ada
                'semester' => 'genap',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kd_mapel' => 'IPA01',
                'mapel' => 'Ilmu Pengetahuan Alam',
                'id_kelas' => 1, // Sesuaikan dengan id kelas yang ada
                'semester' => 'ganjil',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kd_mapel' => 'IPS01',
                'mapel' => 'Ilmu Pengetahuan Sosial',
                'id_kelas' => 1, // Sesuaikan dengan id kelas yang ada
                'semester' => 'genap',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
