@extends('layout/main')
@section('container')
<main>
        <div class="container">
          <div class="col-6 mx-auto">
            <form action="{{route('index')}}">
            <div class="input-group mt-4 mb-4">
  
              <input type="text" class="form-control rounded" name="search" placeholder="Search" aria-label="Search Movie" aria-describedby="search-addon" value="{{request('search')}}" />
            
            </div>
          </form>
          </div>

     
          <div class="row">
            @if($movie->count())
            @foreach ($movie as $m)
            <div class="col-md-4">
              <div class=" mb-4 shadow-sm">
                <img class="img-top img-list "  src="{{ asset('storage/'. $m->gambar)}}"  >
                <div class="card-body text-center">
                    <h4>{{$m->nama_movie}} ({{formatYears($m->created_at)}})</h4>
                    <a href="/{{$m->slug}}" class="stretched-link"></a>
                </div>
              </div>
            </div>
            @endforeach
            @else
              <div class="col text-center">
                <h4>Movie Not Found</h4>
              </div>
            @endif
          </div>
        </div>
</main>
@endsection