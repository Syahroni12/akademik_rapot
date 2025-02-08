<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali_Kelas extends Model
{
    use HasFactory;

    protected $table = 'wali_kelas';
    protected $primaryKey = 'nip';
    protected $guarded = ['nip'];
    public $incrementing = false;

    public function detail_kelas()
    {
        return $this->belongsTo(Detail_kelas::class, 'id_detail_kelas', 'id');
    }


public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
}
