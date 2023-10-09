<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ImagesGaleri;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected  $fillable=[
        'judul', 'cover'
    ];

    public function images(){
        return $this->HasMany(ImagesGaleri::class);
    }
}
