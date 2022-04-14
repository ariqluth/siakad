<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa_Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_matakuliah'; //mendefinisikan bahwa model ini terkait dengan tabel mahasiswa_matakuliah
    protected $primaryKey = 'id'; // Memanggil isi DB Dengan primarykey
    protected $fillable = [
        'id_mahasiswa',
        'id_matakuliah',
        'nilai_angka',
        'nilai_huruf',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
