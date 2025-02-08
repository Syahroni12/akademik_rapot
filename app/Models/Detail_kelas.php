<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_kelas extends Model
{
    use HasFactory;

    protected $table = 'detail_kelas';
    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function wali_kelas()
    {
        return $this->hasOne(Wali_Kelas::class, 'id_detail_kelas', 'id');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_detail_kelas', 'id');
    }


    public function penillaian()
    {
        return $this->hasMany(Penilaian::class, 'id_detail_kelas', 'id');
    }
}
