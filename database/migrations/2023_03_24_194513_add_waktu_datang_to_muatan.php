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
        Schema::table('muatans', function (Blueprint $table) {
            $table->time('waktu_datang');
            $table->time('waktu_bongkar');
            $table->integer('waktu_selesai');
            $table->integer('kendaraan');
        });

        Schema::table('unloading', function (Blueprint $table) {
            $table->dropColumn('waktu_datang');
            $table->dropColumn('waktu_bongkar');
            $table->dropColumn('waktu_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('muatans', function (Blueprint $table) {
            $table->dropColumn([
                'waktu_datang',
                'waktu_bongkar',
                'waktu_selesai',
                'kendaraan',
            ]);
        });

        Schema::table('unloading', function (Blueprint $table) {
            $table->time('waktu_datang');
            $table->time('waktu_bongkar');
            $table->integer('waktu_selesai');
        });
    }
};
