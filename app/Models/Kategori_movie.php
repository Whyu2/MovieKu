<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id','movie_id'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function list_kategori ($id_movie){
        $result = Kategori_movie::where('movie_id', '=', $id_movie)->get();
            return $result;
        }

    public function checkbox ($id_movie, $id_kategori){
    $cek = Kategori_movie::where([
        ['kategori_id', '=', $id_kategori],
        ['movie_id', '=', $id_movie]
    ])->first();

    $result = $cek ? true : false;
        return $result;
    }
}
