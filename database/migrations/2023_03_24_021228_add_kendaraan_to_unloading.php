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
        Schema::table('unloading', function (Blueprint $table) {
            $table->string('kendaraan', 30)->nullable();
            $table->date('tanggal_bongkar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unloading', function (Blueprint $table) {
            $table->dropColumn(['kendaraan', 'tanggal_bongkar']);
        });
    }
};
