<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Movie;
use App\Models\Kategori_movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->kategori_movie = new Kategori_movie();
    }


    public function index()
    {
        $m = Movie::all();
        $data = [
            'tittle' => 'List Movie',
            'movies' => $m,
            'kategori_movie' => $this->kategori_movie,
        ];
        return view('admin.movie', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //bikin kode tiap movie
        $movie = Movie::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(3)) , 3,"0") as movie')->first();
        $addkode = new Movie();
        $addkode->movie = 'MK'. $movie->movie; 

        $k = Kategori::all();

        $data = [
            'tittle' => 'Add Movie',
            'kategori' => $k,
            'kode' =>   $addkode
        ];
        return view('admin.add_movie', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_movie' => 'required|max:128',
            'tgl_rilis' => 'required|date|date_format:Y-m-d',
            'durasi' => 'required|numeric',
            'sinopsis' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);

       $image =  $request->file('gambar')->store('gambar-movie');

       $tgl_rilis = date('Y-m-d H:i:s', strtotime($request->tgl_rilis));
  
       $movies = Movie::create([
        'kd_movie' => $request->kd_movie,
        'slug' => SlugService::createSlug(Movie::class, 'slug', $request->nama_movie),
        'nama_movie' => $request->nama_movie,
        'gambar' => $image,
        'tgl_rilis' => $tgl_rilis,
        'durasi' => $request->durasi,
        'sinopsis' => $request->sinopsis,
        ]);

        $movieku = Movie::where('kd_movie',$request->kd_movie)->first();

        // dd($movieku->id);

        for ($i=0; $i<count($request->id_kategori); $i++){
            $save = [
            'kategori_id' => $request->id_kategori[$i],
            'movie_id' => $movieku->id,
        ];
        DB::table('kategori_movies')->insert($save);
    }

        return redirect('admin/movie')->with('sukses', 'Data Moviie, Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $m = Movie::find($id);
        $k = Kategori::all();
        $data = [
            'tittle' => 'Edit Movie',
            'kategori' => $k,
            'movie' => $m,
            'kategori_movie' => $this->kategori_movie,
        ];
        return view('admin.edit_movie', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_movie' => 'required|max:128',
            'tgl_rilis' => 'required|date|date_format:Y-m-d',
            'durasi' => 'required|numeric',
            'sinopsis' => 'required',
            'gambar' => 'image|file|max:1024'
        ]);
        $movie = Movie::whereid($id)->first();
        $image = $movie->gambar;

        if($request->file('gambar')){
            Storage::delete($request->old_gambar);
            $image =  $request->file('gambar')->store('gambar-movie');
        }
        $tgl_rilis = date('Y-m-d H:i:s', strtotime($request->tgl_rilis));
 
        $movie->update([
            'kd_movie' => $request->kd_movie,
            'slug' => SlugService::createSlug(Movie::class, 'slug', $request->nama_movie),
            'nama_movie' => $request->nama_movie,
            'gambar' => $image,
            'tgl_rilis' => $tgl_rilis,
            'durasi' => $request->durasi,
            'sinopsis' => $request->sinopsis,
        ]);



        Kategori_movie::where('movie_id', $id)->delete();
        for ($i=0; $i<count($request->id_kategori); $i++){
            $save = [
            'kategori_id' => $request->id_kategori[$i],
            'movie_id' => $id,
        ];
        DB::table('kategori_movies')->insert($save);
    }

        return redirect('/movie/edit/'.$id)->with('sukses', 'Data Movie, Berhasil Diedit!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id= $request->id_movie;
        $movie = Movie::whereId($id)->first();
        if($movie->gambar){
            Storage::delete($movie->gambar);
        }
        Movie::whereId($id)->delete();

        return redirect('/admin/movie')->with('hapus', 'Data Movie berhasil dihapus!');
    }
}
