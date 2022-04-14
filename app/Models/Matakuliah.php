<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table ='matakuliah'; //mendefinisikan bahwa model ini terkait dengan tabel matakuliah
   
    protected $fillable = [
        'nama_matakuliah',
      ];

    public function mahasiswa_matakuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliah::class); //mendefinisikan bahwa model ini terkait dengan tabel dosen
    }
}
