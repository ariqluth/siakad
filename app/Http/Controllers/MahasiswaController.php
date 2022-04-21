<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mahasiswa_Matakuliah;
use Illuminate\Support\Facades\Storage;
use PDF;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                //fungsi eloquent menampilkan data menggunakan pagination
                if (request('search')){
                    $paginate = Mahasiswa::where('nim', 'like', '%'.request('search').'%')
                                            ->orwhere('nama', 'like', '%'.request('search').'%')
                                            ->orwhere('kelas', 'like', '%'.request('search').'%')
                                            ->orwhere('jurusan', 'like', '%'.request('search').'%')
                                            ->paginate(5);
                    return view('mahasiswa.index', ['paginate'=>$paginate]);
                } else {
                    //fungsi eloquent menampilkan data menggunakan pagination
                    $mahasiswa = Mahasiswa::with('kelas')->get(); //mengambil semua isi tabel
                    $paginate= Mahasiswa::orderBy('id_mahasiswa','asc')->paginate(3);
                    return view('mahasiswa.index',['mahasiswa' => $mahasiswa ,'paginate'=>$paginate]);
                }
            }
    
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create', ['kelas' => $kelas]);
     }
    public function store(Request $request)
    
    {
        // tester create data 
        // return $request;

    if ($request->file('image')) {
        $image_name = $request->file('image')->store('images', 'public');
    }

 //melakukan validasi data
   
          $request->validate([
            'Nim' => 'required',
            'Nama' => 'required', 
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Featured_Image' => 'image|file|max:1024',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
           
    ]);
    $mahasiswa = new Mahasiswa;
    $mahasiswa->nim = $request->get('Nim');
    $mahasiswa->nama = $request->get('Nama');
    $mahasiswa->jurusan = $request->get('Jurusan');
    $mahasiswa->featured_image = $image_name;
    $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
    $mahasiswa->email = $request->get('Email');
    $mahasiswa->alamat = $request->get('Alamat');
    $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
    $mahasiswa->kelas_id = $request->get('Kelas');
    $mahasiswa->save();

        

    // $validateData['kelas_id'] = $request->get('Kelas');

    // Mahasiswa::create($validateData);
    

    // fugsi eloquent untuk menambhakan ddata dengan relasi belongsTo
    // $mahasiswa->kelas()->associate($kelas);
    // $mahasiswa->save();
    
    // //fungsi eloquent untuk menambah data
    // Mahasiswa::create($request->all());


    //jika data berhasil ditambahkan, akan kembali ke halaman utama
    return redirect()->route('mahasiswa.index')
    ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    
    }
    public function show($nim)
    {
    //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
    // $Mahasiswa = Mahasiswa::where('nim', $nim)->first();

    $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
    // return view('mahasiswa.detail', compact('Mahasiswa'));
    return view('mahasiswa.detail', ['Mahasiswa' => $mahasiswa]);
    }
 
    public function edit(Request $request, $nim)
    {

        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit

        // $Mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('mahasiswa','kelas'));
 }

     public function update(Request $request, $nim)
 
     {

         //melakukan validasi data

         $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Kelas' => 'required',
            'Jurusan' => 'required',
            'Featured_Image' => 'image|file|max:1024',
            'Jenis_Kelamin' => 'required',
            'Email' => 'required',
            'Alamat' => 'required',
            'Tanggal_Lahir' => 'required',
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
 
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        // validasi foto jika foto lama akan dihapus / diganti
        if ($mahasiswa->featured_image && file_exists(storage_path('app/public/' . $mahasiswa->featured_image))) {
            Storage::delete('public/' . $mahasiswa->featured_image);  

            $image_name = $request->file('image')->store('images', 'public');
        }
      
     
        $mahasiswa->nim = $request->get('Nim');
        $mahasiswa->nama = $request->get('Nama');
        $mahasiswa->jurusan = $request->get('Jurusan');
        $mahasiswa->featured_image = $image_name;
        $mahasiswa->jenis_kelamin = $request->get('Jenis_Kelamin');
        $mahasiswa->email = $request->get('Email');
        $mahasiswa->alamat = $request->get('Alamat');
        $mahasiswa->tanggal_lahir = $request->get('Tanggal_Lahir');
        $mahasiswa->kelas_id = $request->get('Kelas');
        $mahasiswa->save();
        
       
        
        // fugsi eloquent untuk menambhakan ddata dengan relasi belongsTo
        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama

        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Diupdate');
    }
    public function destroy( $nim)
    {
          //fungsi eloquent untuk menghapus data
       $mahasiswa = Mahasiswa::findOrFail($nim);

        if( Storage::delete('public/' . $mahasiswa->featured_image)) {
          $mahasiswa->delete();  
    }
      
 

       
return redirect()->route('mahasiswa.index')
-> with('success', 'Mahasiswa Berhasil Dihapus');
 
    }


    public function khs($id)
    {

        $khs = Mahasiswa_Matakuliah::where('mahasiswa_id', $id)
            ->with('mahasiswa', 'matakuliah')->get();
        $mhs = Mahasiswa::with('kelas')->where('id_mahasiswa', $id)->first();

        return view('mahasiswa.nilairaport', compact('khs', 'mhs'));
    }

    public function print_cetak($nim){
        $mahasiswa = Mahasiswa::with('kelas')->where("nim", $nim)->first();
        $matkul = Mahasiswa_Matakuliah::with("matakuliah")->where("mahasiswa_id", ($mahasiswa -> id_mahasiswa))->get();
        $pdf = PDF::loadview('mahasiswa.print_cetak', ['mahasiswa' => $mahasiswa,'matakuliah'=>$matkul]);
        return $pdf->stream();
    }

};
