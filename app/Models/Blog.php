<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'penulis', 'judul', 'slug', 'body', 'kategori_blog_id', 'gambar', 'is_active', 'delete'
    ];

    protected $hidden = [];

    public function kategori_blog(){
        return $this->belongsTo(KategoriBlog::class, 'kategori_blog_id', 'id');
    }
}
