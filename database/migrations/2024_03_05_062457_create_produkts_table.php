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
        Schema::create('produkt', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('nama_suplier');
            $table->double('harga_beli');
            $table->double('harga_jual');
            $table->integer('stok');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produkt');
    }
};
