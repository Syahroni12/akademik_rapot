<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengikut_ekskul extends Model
{
    use HasFactory;

    protected $table = 'pengikut_ekskuls';

    protected $fillable = [
        'id_ekskul',
        'id_siswa',
        'keterangan'
    ];

    public function ekskul()
    {
        return $this->belongsTo(Ekskul::class, 'id_ekskul', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'nisn');
    }
}
