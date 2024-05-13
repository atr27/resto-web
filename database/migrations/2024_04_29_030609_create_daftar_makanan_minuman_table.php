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
        Schema::create('daftar_makanan_minuman', function (Blueprint $table) {
            $table->integer('id_makanan_minuman')->autoIncrement();
            $table->string('nama_makanan_minuman');
            $table->integer('harga')->default(0);
            $table->integer('stok')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_makanan_minumen');
    }
};
