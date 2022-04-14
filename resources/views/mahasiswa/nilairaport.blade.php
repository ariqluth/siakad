@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h4>JURUSAN TEKNOLOGI INFORMASI POLITEKNIK NEGERI MALANG</h4>
    </div>
    <h2 class="text-center mt-4 mb-5">KARTU HASIL NILAI STUDI (KHS)</h2>
   <div class="float-left mb-5">
    <strong>Name: </strong> {{$mhs->nama}}<br>
    <strong>NIM: </strong> {{$mhs->nim}}<br>
    <strong>Class: </strong> {{$mhs->kelas->nama_kelas}}<br><br>
   </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">SKS</th>
                <th scope="col">Semester</th>
                <th scope="col">Nilai Angka</th>
                <th scope="col">Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            @foreach($khs as $mk)
            <tr>
                <td>{{$mk->matakuliah->nama_matkul}}</td>
                <td>{{$mk->matakuliah->sks}}</td>
                <td>{{$mk->matakuliah->semester}}</td>
                <td>{{$mk->nilai_angka}}</td>
                <td>{{$mk->nilai_huruf}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-right">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-success">Kembali</a>

    </div>
    </div>
@endsection