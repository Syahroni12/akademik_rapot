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
        Schema::create('ketidakhadirans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('nisn')->on('siswas')->onDelete('cascade');
            $table->integer('sakit');
            $table->integer('izin');
            $table->integer('alpha');
            $table->unsignedBigInteger('id_detail_kelas');
            $table->foreign('id_detail_kelas')->references('id')->on('detail_kelas')->onDelete('cascade');
            $table->enum('semester', ['ganjil', 'genap']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketidakhadirans');
    }
};
