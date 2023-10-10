<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesEkstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'images_ekstrakurikuler';

    protected $fillable=[
        'image', 'ekstrakurikuler_id'
    ];

    public function ekstrakurikuler(){
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}
