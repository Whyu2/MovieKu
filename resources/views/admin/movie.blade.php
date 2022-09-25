@extends('layout/main')
@section('container')
<main>
      <div class="col-12 ">
        <h1>List Movie</h1>
        <a href="/admin/add_movie" class="btn btn-primary" role="button" aria-disabled="true">Tambah Movie</a>
        <hr>
        @if(session()->has('sukses'))
        <div class="alert alert-success allert-dismissible fade show mt-1" role="alert">
          {{session('sukses')}}
        </div>
        @endif
        @if(session()->has('hapus'))
        <div class="alert alert-danger allert-dismissible fade show mt-1" role="alert">
          {{session('hapus')}}
        </div>
        @endif
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
              <tr>
                  <th class="text-center" style="width:15%">Nama</th>
                  <th class="text-center" style="width:25%">Gambar</th>
                  <th class="text-center" style="width:15%">Kategori</th>
                  <th class="text-center" style="width:15%">Tanggal Rilis</th>
                  <th class="text-center" style="width:10%">Durasi</th>
                  <th class="text-center" style="width:20%">Aksi</th>
              </tr>
          </thead>
          <tbody>
           
              @foreach ($movies as $key => $m)
              <tr>
                  <td>{{$m->nama_movie}}</td>
                  <td> <img class="img-list-tabel"  src="{{ asset('storage/'. $m->gambar)}}"  ></td>
                  @php 
                  $result = $kategori_movie->list_kategori($m->id);
                @endphp
                  <td>
                  <ul style="list-style-type: disc;">
                  @foreach ($result as $k)
                  <li>
                  {{$k->kategori->nama_kategori}}  
                 </li> 
                  @endforeach
                  </ul>
                  </td>
                  <td>{{formatDate($m->tgl_rilis)}}</td>
                  <td>{{$m->durasi}} Menit</td>
                  <th class="text-center">
                    <a href="{{route('edit_movie',$m->id)}}"class="btn btn-primary btnku " ><i class="fas fa-edit"></i></a>
                    <button type="button" value="{{$m->id}}" class="btn btn-danger delete_btn_movie"><i class="fa fa-trash"></i></button>
                    <a href="/{{$m->slug}}" class="btn btn-success"><i class="fa-regular fa-file-lines"></i></a>

                  </th>
              </tr>
            @endforeach
          </tbody>
          
      </table>
      </div>

      {{-- modal delete --}}
      <div class="modal fade" id="DeleteModalMovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash fa-1x"></i> Hapus Movie</h5>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{route('movie_delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <label>Yakin akan dihapus ?</label>
                <input type="hidden" id="id_delete" name="id_movie">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
            </div>
          </div>
        </div>
      </div>
</main>
@endsection