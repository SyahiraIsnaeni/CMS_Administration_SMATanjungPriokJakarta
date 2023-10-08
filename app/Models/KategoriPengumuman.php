<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengumuman extends Model
{
    use HasFactory;

    protected $table = 'kategoripengumuman';

    protected $fillable = [
        'nama_kategori', 'slug'
    ];

    protected $hidden = [];
}
