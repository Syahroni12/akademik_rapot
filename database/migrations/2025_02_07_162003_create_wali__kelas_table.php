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
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->unsignedBigInteger('nip')->primary();
            $table->string('nama', 50);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->date('tgl_lahir');
            $table->string('agama', 20);
            $table->string('tempat_lahir');
            $table->text('alamat');

            $table->unsignedBigInteger('id_detail_kelas');
            $table->foreign('id_detail_kelas')->references('id')->on('detail_kelas')->onDelete('cascade');
            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali__kelas');
    }
};
