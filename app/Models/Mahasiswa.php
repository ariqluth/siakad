<?php

namespace App\Models;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //Model Eloquent

class Mahasiswa extends Model //Definisi Model
{
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record ditabel mahasiswa
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    
 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
        'Nim',
        'Nama',
        'Kelas',
        'Jurusan',
        'Jenis_Kelamin',
        'Email',
        'Alamat',
        'Tanggal_Lahir'
           
 ];

 public function kelas()
  {
     return $this->belongsTo('App\Models\Kelas' , 'kelas_id');
 }

    public function mahasiswa_matakuliah()
    {
        return $this->belongsToMany('App\Models\Mahasiswa_Matakuliah','id_mahasiswa');
    }
};