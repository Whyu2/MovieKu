<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Kategori_movie;
use Illuminate\Http\Request;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k = Kategori::all();
        $data = [
            'tittle' => 'kategori Movie',
            'kategori' => $k
        ];
        return view('admin.kategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'tittle' => 'Add Kategori'
        ];
        return view('admin.add_kategori', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama_kategori' => 'required|max:50|unique:kategoris,nama_kategori',
        ]);
        
            $kategoris = Kategori::create([
                'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('admin/kategori')->with('sukses', 'Data kategori, Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $k = Kategori::find($id);
        $data = [
            'tittle' => 'Edit kategori',
            'kategori' => $k
        ];
        return view('admin.edit_kategori', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriRequest  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:50|unique:kategoris,nama_kategori',
        ]);

        $kategori = Kategori::whereid($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/kategori/edit/'.$id)->with('sukses', 'Data kategori, Berhasil Diedit!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id= $request->id_kategori;
        $kategori_movie = Kategori_movie::where('kategori_id',$id)->first();
        if ($kategori_movie) {
            return redirect('/admin/kategori')->with('hapus', 'Data Kategori gagal dihapus karena masih digunakan !');
        } else {
            Kategori::whereId($id)->delete();
            return redirect('/admin/kategori')->with('hapus', 'Data Kategori berhasil dihapus!');
        }

    }
}
