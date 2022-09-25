<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Models\Kategori_movie;
use App\Models\Kategori;
use Illuminate\Http\Request;


class HalamanController extends Controller
{
    public function index()
    {
        $m = Movie::all();

        if(request('search')){
        $m = Movie::where('nama_movie', 'LIKE', '%'.request('search').'%')->get();
        }
        $data = [
            'tittle' => 'Home',
            'movie' => $m,
        ];
        return view('home', $data);
    }

    public function detail($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $kategori = Kategori_movie::where('movie_id', $movie->id)->get();
        $data = [
            'tittle' => 'Detail Movie',
            'movie' => $movie,
            'kategori' => $kategori
        ];

        return view('detail', $data);
    }

    public function search(Request $request)
    {

        $searchmovie = Movie::where('nama_movie', 'LIKE', '%'.$request->search.'%')->get();

        $data = [
            'tittle' => 'Result Search',
            'movie' => $searchmovie,
        ];
        return view('search', $data);
    }


 
}
