<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaIsi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nim' => '2142435234',	
                'nama' => 'Luthfi Ariqa',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'ttzluthfi@gmail.com',	
                'alamat' => 'Kediri',
                'tanggal_lahir' => '1999-03-14', 
            ],
            [
                'nim' => '2241531361',	
                'nama' => 'Erlangga Hendrika',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'mugiwarassae03@gmail.com',	
                'alamat' => 'Nganjuk',
                'tanggal_lahir' => '2001-11-14', 
            ],
            [
                'nim' => '2314424151',	
                'nama' => 'Pratama Mahendra',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'mugiwarassae03@gmail.com',	
                'alamat' => 'PermunassimaBlok21',
                'tanggal_lahir' => '2001-11-14', 
            ],
            [
                'nim' => '2241516345',	
                'nama' => 'PukianMan',
                'jurusan' => 'Teknologi Informasi',
                'jenis_kelamin' => 'Laki-Laki',	
                'email' => 'mugiwarassae03@gmail.com',	
                'alamat' => 'PermunassimaBlok21',
                'tanggal_lahir' => '2001-11-14', 
            ],
        ];
        DB::table('mahasiswa')->insert($data);
    }
    
}
