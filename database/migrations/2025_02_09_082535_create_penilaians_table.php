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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa');
            $table->foreign('id_siswa')->references('nisn')->on('siswas')->onDelete('cascade');
            $table->unsignedBigInteger('id_wali_kelas');
            $table->foreign('id_wali_kelas')->references('nip')->on('wali_kelas')->onDelete('cascade');
            $table->string('id_mapel');
            $table->foreign('id_mapel')->references('kd_mapel')->on('mapels')->onDelete('cascade');
            $table->unsignedBigInteger('id_detail_kelas');
            $table->foreign('id_detail_kelas')->references('id')->on('detail_kelas')->onDelete('cascade');
            $table->integer('tahun_ajaran1');
            $table->integer('tahun_ajaran2');
            $table->enum('semester', ['ganjil', 'genap']);
            $table->float('nh');
            $table->float('uts');
            $table->float('uas');
            $table->float('nilai_akhir');
            $table->text('deskripsi');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
