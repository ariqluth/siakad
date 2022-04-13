<?php

namespace App\Models;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kelas extends Model
{
    use HasFactory;
    protected $table ='kelas'; //mendefinisikan bahwa model ini terkait dengan tabel kelas

    protected $fillable = [
        'nama_kelas',
        
        
 ];

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class); //mendefinisikan bahwa model ini terkait dengan tabel mahasiswa
    }
}
