<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id');
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class, 'id_kelas', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas', 'id');
    }

    public function wali_kelas()
    {
        return $this->hasOne(Wali_Kelas::class, 'id_kelas', 'id');
    }
}
