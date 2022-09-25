@extends('layout/main')
@section('container')
<main>
      <div class="col-12 ">
        <h1>Kategori Movie</h1>
        <a href="/admin/add_kategori" class="btn btn-primary" role="button" aria-disabled="true">Tambah kategori</a>
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
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Tanggal Buat</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
            <?php $number=1; ?>
            @foreach ($kategori as $key => $kat)
              <tr>
                  <td>{{$number}}</td>
                  <?php $number++; ?>
                  <td>{{$kat->nama_kategori}}</td>
                  <td>{{formatDate($kat->created_at)}}</td>
                  <th>
                    <a href="{{route('edit_kategori',$kat->id)}}"class="btn btn-primary btnku " ><i class="fas fa-edit"></i></a>
                    <button type="button" value="{{$kat->id}}" class="btn btn-danger m-1 delete_btn_kategori"><i class="fa fa-trash"></i></button>
                </th>
                </tr>
            @endforeach
          </tbody>
      </table>
      </div>
</main>

{{-- modal delete --}}
<div class="modal fade" id="DeleteModalKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash fa-1x"></i> Hapus Kategori</h5>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('kategori_delete')}}" method="POST">
            @csrf
            @method('DELETE')
            <label>Yakin akan dihapus ?</label>
            <input type="hidden" id="id_delete" name="id_kategori">
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  
@endsection