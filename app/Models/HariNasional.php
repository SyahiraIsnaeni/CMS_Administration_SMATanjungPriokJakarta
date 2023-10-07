<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HariNasional extends Model
{
    use HasFactory;

    protected $table = 'hari-nasional';

    protected $fillable = [
        'nama_hari', 'gambar', 'deskripsi'
    ];

    protected $hidden = [];
}
