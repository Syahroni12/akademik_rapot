<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas';
    protected $primaryKey = 'nisn';
    protected $guarded = ['nisn'];
    public $incrementing = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function pengikut_ekskul()
    {
        return $this->hasMany(Pengikut_Ekskul::class, 'id_siswa', 'nisn');
    }
}
