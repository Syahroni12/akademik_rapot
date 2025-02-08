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
        Schema::create('siswas', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('nisn')->primary();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('id_detail_kelas')->nullable();
            $table->foreign('id_detail_kelas')->references('id')->on('detail_kelas')->onDelete('cascade');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('agama', 20);
            $table->text('tempat_lahir');
            $table->string('tahun_masuk', 10);
            $table->timestamps();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
