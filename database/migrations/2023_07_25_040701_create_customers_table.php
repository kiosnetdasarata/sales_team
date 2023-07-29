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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('id_sales');
            $table->string('nama_customer');
            $table->string('alamat');
            $table->string('nomor_telepon');
            $table->string('metode_bertemu');
            $table->string('status');
            $table->string('alamat_pemasangan');
            $table->string('koordinat_pemasangan');
            $table->string('id_paket');
            $table->string('id_promo');
            $table->string('foto_ktp');
            $table->string('foto_rumah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
