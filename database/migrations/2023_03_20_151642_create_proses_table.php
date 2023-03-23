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
        Schema::create('proses', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('unloading_id');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('tipe_produk',50);
            $table->string('grade', 20);
            $table->string('berat_produk', 20);
            $table->string('jumlah_produk', 20);
            $table->string('randemen', 50);
            $table->string('berat_gagal', 20);
            $table->string('jumlah_gagal', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses');
    }
};
