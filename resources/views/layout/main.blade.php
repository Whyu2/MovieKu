<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="csrf-token" content="{{ csrf_token() }}"/> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"  crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    <title>{{$tittle}}</title>
  </head>
  <body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      @auth
      <a href="/admin/movie" class="logo navbar-brand my-0 mr-md-auto font-weight-normal">Admin MovieKu</a>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/admin/movie">List Movie</a>
        <a class="p-2 text-dark" href="/admin/kategori">List Kategori</a>
      </nav>
      <form action="/logout" method="post">
        @csrf
        <button type="submit"  class="btn btn-danger">Log Out</button>
      </form>
    
      @else
      <a href="/" class="logo navbar-brand my-0 mr-md-auto font-weight-normal">MovieKu</a>
      <a class="btn btn-primary" href="/login">Login</a>
      @endauth
 

    </div>
  

    @yield('container')

    <footer class="footer bg-white border-top box-shadow">
      <div class="container text-center">
        <span class="text-secondary text-center logo">Movieku @2022</span>
      </div>
    </footer>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('js/app.js') }}"></script>
  </body>
</html>


<script type="text/javascript">
  $(function() {
     
  });
</script>