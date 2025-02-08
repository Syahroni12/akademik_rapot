<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaians';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'kd_mapel');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'nisn');
    }

    public function wali_kelas()
    {
        return $this->belongsTo(Wali_Kelas::class, 'nip', 'nip');
    }

    public function detail_kelas()
    {
        return $this->belongsTo(Detail_kelas::class, 'id_detail_kelas', 'id');
    }
}
