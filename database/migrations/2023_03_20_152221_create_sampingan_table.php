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
        Schema::create('sampingan', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('unloading_id');
            $table->integer('proses_id');
            $table->string('berat_kepala_leher', 20);
            $table->string('prosentase_kepala_leher', 20);
            $table->string('berat_kepala_tanpa_leher', 20);
            $table->string('prosentase_kepala_tanpa_leher', 20);
            $table->string('berat_usus', 20);
            $table->string('prosentase_usus', 20);
            $table->string('berat_hja', 20);
            $table->string('prosentase_hja', 20);
            $table->string('berat_ceker', 20);
            $table->string('prosentase_ceker', 20);
            $table->string('berat_tembolok', 20);
            $table->string('prosentase_tembolok', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sampingan');
    }
};
