<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    use HasFactory;

    protected $table = 'kepseks';
    protected $primaryKey = 'nip';
    protected $guarded = ['nip'];
}
