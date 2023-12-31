<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('penulis')->default('Admin SMA Tanjung Priok');
            $table->string('judul');
            $table->string('slug');
            $table->text('body');
            $table->integer('kategori_pengumuman_id');
            $table->string('gambar');
            $table->string('dokumen')->nullable();
            $table->boolean('is_active');
            $table->string('delete')->default('N');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
