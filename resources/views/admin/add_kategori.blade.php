@extends('layout/main')
@section('container')
<main>
      <div class="col-12 ">
        <h1>Tambah Kategori</h1>
        <hr>
        <form action="/kategori/store" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" placeholder="masukkan nama kategori" 
                    class="form-control @error('nama_kategori') is-invalid @enderror" 
                    value="{{ old('nama_kategori') }}"
                    required
                    >
                    @error('nama_kategori')
                        <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
      </div>
 

</main>
@endsection