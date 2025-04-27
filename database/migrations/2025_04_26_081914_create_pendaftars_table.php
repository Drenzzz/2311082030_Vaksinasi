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
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->date('tanggal_lahir');
            $table->string('jenis_vaksin');
            $table->string('lokasi_vaksin');
            $table->date('tanggal_vaksin');
            $table->enum('status', ['terdaftar', 'hadir', 'tidak hadir'])->default('terdaftar');
            $table->timestamps();
            $table->softDeletes(); // Untuk fitur soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
