@extends('layout/main')


@section('container')

        <div class="container">
          <div class="row">
            <div class="col-md-3 login-admin mx-auto">
           
            <form class="form-signin" action="/login" method="post">
              @csrf
              <div class="text-center mb-4">
               
                <h1 class="h3 mb-3 font-weight-normal">Login Admin</h1>
               
              </div>
              @if(session()->has('gagal'))
              <div class="alert alert-danger allert-dismissible fade show mt-1" role="alert">
                {{session('gagal')}}
              </div>
              @endif
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" placeholder="Email addres" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}"
                >
                @error('email')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" name="password" placeholder="Password" 
                class="form-control @error('password') is-invalid @enderror" 
                value="{{ old('password') }}"
                >
                @error('password')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
              </div>
{{-- 
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Movie</label>
                <input type="text" name="nama_movie" placeholder="masukkan nama movie" 
                class="form-control @error('nama_movie') is-invalid @enderror" 
                value="{{ old('nama_movie') }}"
                >
                @error('nama_movie')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
              </div> --}}


              {{-- <div class="form-label-group">
                <input type="email" name="email" class="form-control" placeholder="Email address" 
                class="form-control @error('email') is-invalid @enderror" 
                value="{{ old('email') }}"
                autofocus
                >
                @error('email')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
                <label for="inputEmail">Email address</label>
              </div> --}}
        
              {{-- <div class="form-label-group">
                <input type="password" name="password"  class="form-control" placeholder="Password" 
                value="{{ old('password') }}"
             
                autofocus
                >
                @error('password')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
                <label for="inputPassword">Password</label>
              </div> --}}
              {{-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama Movie</label>
                <input type="text" name="nama_movie" placeholder="masukkan nama movie" 
                class="form-control @error('nama_movie') is-invalid @enderror" 
                value="{{ old('nama_movie') }}"
                >
                @error('nama_movie')
                <div class="invalid-feedback"> {{ $message }}</div>
               @enderror
              </div> --}}
              
              <button class=" mb-3 btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  
            </form>
          </div>
          </div>
        </div>

@endsection