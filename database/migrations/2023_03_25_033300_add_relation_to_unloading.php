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
            $table->unsignedBigInteger('customer_id')->change();
            $table->foreign('customer_id')->references('id')->on('customer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unloading', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->integer('customer_id')->change();
        });
    }
};
