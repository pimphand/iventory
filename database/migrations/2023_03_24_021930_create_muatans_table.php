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
        Schema::create('muatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unloading_id')->constrained('unloading', 'id');
            $table->integer('berat_do');
            $table->integer('jumlah_ayam_do');
            $table->integer('berat_timbangan');
            $table->integer('jumlah_diterima');
            $table->integer('berat_mati');
            $table->integer('jumlah_mati');
            $table->integer('berat_ditolak');
            $table->integer('jumlah_ditolak');
            $table->integer('berat_keranjang');
            $table->integer('berat_ratarata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('muatans');
    }
};
