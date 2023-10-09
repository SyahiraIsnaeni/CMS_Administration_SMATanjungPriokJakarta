<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Galeri;

class ImagesGaleri extends Model
{
    use HasFactory;
    protected $table = 'images_galeri';

    protected $fillable=[
        'image', 'galeri_id'
    ];

    public function galeri(){
        return $this->belongsTo(Galeri::class);
    }
}
