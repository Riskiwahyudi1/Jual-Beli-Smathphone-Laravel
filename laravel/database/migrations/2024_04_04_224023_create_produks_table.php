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
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id');
            $table->foreignId('user_id');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->json('spesifikasi');  
            $table->string('harga');
            $table->integer('stok');
            $table->integer('terjual');
            $table->integer('diskon');
            $table->string('brand');
            $table->json('foto');
            $table->string('status');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
