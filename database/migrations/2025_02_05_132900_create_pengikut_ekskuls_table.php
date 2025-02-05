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
        Schema::create('pengikut_ekskuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ekskul');
            $table->foreign('id_ekskul')->references('id')->on('ekskuls')->onDelete('cascade');
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('nisn')->on('siswas')->onDelete('cascade');
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengikut_ekskuls');
    }
};
