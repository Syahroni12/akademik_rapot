<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
    protected $guarded = 'kd_mapel';
    protected $primaryKey = 'kd_mapel'; // Set primary key ke 'kd_mapel'
    public $incrementing = false; // Jika bukan auto-increment
    protected $keyType = 'string';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    public function penilaian() {
        return $this->hasMany(Penilaian::class, 'id_mapel', 'kd_mapel');

    }
}
