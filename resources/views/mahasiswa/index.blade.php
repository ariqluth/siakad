@extends('mahasiswa.layout')

@section('content')
 <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
         <div class="float-right my-2">
        <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
    </div>
    </div>
 </div>


    {{-- percobaan  --}}
    {{-- <script>
        swal("Selamat datang di website kami");
  </script> --}}

  

     @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
        @if ($message = Session::get('error'))
    <div class="alert alert-error">
    <p>{{ $message }}</p>
    </div>
    @endif

    <br>
    {{-- search bar --}}
    <div class="row justify-content-center mb-3">
      <div class="col-md-6">
      <form action="{{ route('mahasiswa.index') }}">
          <div class="input-group mb-2">
              <input type="text" class="form-control" placeholder="Pencarian  " name="search" value="{{ request('search')}}">
              <button class="btn btn-primary" type="submit">Search</button>
          </div>
          </div>
      </form>
  </div>

    <table class="table table-bordered">
    <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Foto</th>
       
        <th width="280px">Action</th>
    </tr>
    @foreach ($paginate as $mhs)
    
    <tr>
        <td>{{ $mhs ->nim }}</td>
        <td>{{ $mhs ->nama }}</td>
        <td>{{ $mhs ->kelas['nama_kelas']}}</td>
        <td>{{ $mhs ->jurusan }}</td>
        <td><img width="150px" src="{{asset('storage/'.$mhs->featured_image)}}"></td>
       
    <td>
      <form action="{{ route('mahasiswa.destroy', $mhs->nim) }}" method="POST">
      

             <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
             <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>

             <a class="btn btn-warning" href="{{ route('mahasiswa.nilairaport',$mhs->id_mahasiswa) }}">Nilai</a>
             @csrf
              @method('DELETE')
{{--             
             <a href="#" type="submit" class="btn btn-warning button" data-id="{{$mhs->nim}}">Delete</a>
              --}}
              <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
</form>
    </td>
        </tr>
    @endforeach
 </table>
 {{ $paginate->links('pagination::bootstrap-4')}}

 {{-- konfirmasi delete  --}}

        <script type="text/javascript">
       $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
         
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
        </script>
</body>
</html>
@endsection