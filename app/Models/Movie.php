<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Cviebrock\EloquentSluggable\Services\SlugService;

class Movie extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'kd_movie','slug','nama_movie','gambar','tgl_rilis','durasi','sinopsis'
    ];
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  
}
