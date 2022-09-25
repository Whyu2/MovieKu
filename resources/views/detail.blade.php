@extends('layout/main')
@section('container')
<main>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img class="img-detail "  src="{{ asset('storage/'. $movie->gambar)}}"  >
            </div>
            <div class="col-md-6">
            <h1><b>{{$movie->nama_movie}}</b></h1>
            <div class="row">
              <div class="col-md-6">
            <p class="text-muted ml-2">{{formatDate($movie->created_at)}}</p> 
              </div>
              <div class="col-md-6">
                <p class="text-muted ml-2">{{$movie->durasi}} menit</p> 
                  </div>
            </div>
            <div class="row p-1">
              @foreach ($kategori as $k)
              <div class="text-genre">{{$k->kategori->nama_kategori}}</div>
              @endforeach    
          </div>
         <hr>
         <h4><b>Sinopsis</b></h4>
          <p>{!!$movie->sinopsis!!}</p>  
            </div>
          </div>
        </div>
</main>
@endsection