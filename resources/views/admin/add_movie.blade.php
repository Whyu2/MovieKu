@extends('layout/main')
@section('container')
<main>
      <div class="col-12 ">
        <h1>Add Movie</h1>
        <hr>
        <div class="row">
        
            <div class="col-md-4">
              <form action="/movie/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
               
                    <img class="img-detail" id="blah"  >
                </div>
                <div class="input-group mb-5">
                    <div class="custom-file">
                      <input type="file" name="gambar" 
                       class="custom-file-input @error('gambar') is-invalid @enderror" 
                       onchange="readURL(this);"
                       required
                       >
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>

                  </div>
                  @error('gambar')
                  <div class="text-danger">
                    {{$message}}
                    </div>
                 @enderror
                
            </div>
            <div class="col-md-8">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Kode Movie</label>
                      <input type="text" name="kd_movie"
                      class="form-control" 
                      value="{{$kode->movie}}"
                      readonly
                      >
                      @error('nama_movie')
                      <div class="invalid-feedback"> {{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Movie</label>
                      <input type="text" name="nama_movie" placeholder="masukkan nama movie" 
                      class="form-control @error('nama_movie') is-invalid @enderror" 
                      value="{{ old('nama_movie') }}"
                      required
                      >
                      @error('nama_movie')
                      <div class="invalid-feedback"> {{ $message }}</div>
                     @enderror
                    </div>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tanggal rilis </label>
                          <div class="input-group">
                            <input type="text" id="datepicker" name="tgl_rilis"
                            class="form-control @error('tgl_rilis') is-invalid @enderror" 
                            value="{{ old('tgl_rilis') }}"
                            >
                            <span class="input-group-append">
                              <span class="input-group-text bg-white">
                                  <i class="fa fa-calendar"></i>
                              </span>
                          </span>
                          @error('tgl_rilis')
                          <div class="invalid-feedback"> {{ $message }}</div>
                         @enderror
                          </div>
                      
                        </div>
                      
                        <div class="col-md-6 ">
                          <label for="exampleInputEmail1" class="form-label">Durasi (min) </label>
                          <input type="number"  name="durasi" placeholder="masukkan durasi movie" 
                          class="form-control @error('durasi') is-invalid @enderror" 
                          value="{{ old('durasi') }}"
                          required
                          min="0" step="1" id="amountInput"
                          >
                     
                          @error('durasi')
                          <div class="invalid-feedback"> {{ $message }}</div>
                         @enderror
                        </div>
                    </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Kategori</label>
                          <?php $number=1; ?>
                          @foreach ($kategori as $kat)
                          <div class="form-check">
                              <input class="form-check-input" name="id_kategori[]" value="{{$kat->id}}" type="checkbox"  id="flexCheckDefault" />
                              <label class="form-check-label" for="flexCheckDefault">{{$kat->nama_kategori}}</label>
                            </div>
                            @endforeach
                        </div>
                    
                
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sinopsis </label>
                        <textarea  id="editor" type="text" name="sinopsis"  
                        class="form-control @error('sinopsis') is-invalid @enderror" 
                        value="{{ old('sinopsis') }}"
                        required rows="4" 
                        >
                      </textarea>
                      @error('sinopsis')
                      <div class="invalid-feedback"> {{ $message }}</div>
                     @enderror
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
      </div>


</main>
@endsection