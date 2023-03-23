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
        Schema::create('unloading', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            // $table->foreignId('customer_id')->constrained();
            $table->time('waktu_datang');
            $table->time('waktu_bongkar');
            $table->string('berat_do',20);
            $table->string('jumlah_ayam_do',20);
            $table->string('berat_timbangan',20);
            $table->string('jumlah_diterima',20);
            $table->string('berat_mati',20);
            $table->string('jumlah_mati',20);
            $table->string('berat_ditolak',20);
            $table->string('jumlah_ditolak',20);
            $table->string('berat_keranjang',20);
            $table->string('berat_ratarata',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unloading');
    }
};
