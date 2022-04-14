<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa_MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilai = [
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 1,
                'nilai_angka' => '80',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 2,
                'nilai_angka' => '80',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 3,
                'nilai_angka' => '98',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 1,
                'matakuliah_id' => 4,
                'nilai_angka' => '80',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 1,
                'nilai_angka' => '85',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 2,
                'nilai_angka' => '88',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 3,
                'nilai_angka' => '85',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 2,
                'matakuliah_id' => 4,
                'nilai_angka' => '75',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 1,
                'nilai_angka' => '90',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 2,
                'nilai_angka' => '93',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 3,
                'nilai_angka' => '99',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 3,
                'matakuliah_id' => 4,
                'nilai_angka' => '85',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 1,
                'nilai_angka' => '90',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 2,
                'nilai_angka' => '93',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 3,
                'nilai_angka' =>' 99',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 4,
                'matakuliah_id' => 4,
                'nilai_angka' => '85',
                'nilai_huruf' => 'B',
            ],

            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 1,
                'nilai_angka' => '90',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 2,
                'nilai_angka' => '93',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 3,
                'nilai_angka' => '99',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 5,
                'matakuliah_id' => 4,
                'nilai_angka' =>' 85',
                'nilai_huruf' => 'B',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 1,
                'nilai_angka' => '90',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 2,
                'nilai_angka' => '93',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 3,
                'nilai_angka' => '99',
                'nilai_huruf' => 'A',
            ],
            [
                'mahasiswa_id' => 6,
                'matakuliah_id' => 4,
                'nilai_angka' => '85',
                'nilai_huruf' => 'B',
            ],

            [
                'mahasiswa_id' => 7,
                'matakuliah_id' => 1,
                'nilai_angka' => '90',
                'nilai_huruf' => 'A',
            ],
        ];
        DB::table('mahasiswa_matakuliah')->insert($nilai);
        
    }
}
