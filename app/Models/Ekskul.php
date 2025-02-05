<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;
    protected $table = 'ekskuls';
    protected $guarded = 'id';

    public function pengikut_ekskul()
    {
        return $this->hasMany(pengikut_ekskul::class, 'id_ekskul', 'id');
    }
}
