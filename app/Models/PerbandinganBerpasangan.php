<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganBerpasangan extends Model
{
    use HasFactory;

    protected $table = 'perbandingan_berpasangan';

    public $timestamps = false;

    protected $primaryKey = 'id_perhitungan';

    protected $fillable = [
        'id_perhitungan',
        'nama_kriteria',
        'c1',
        'c2',
        'c3',
        'c4',
        'c5',
        'c6',
        'c7',
        'c8',
        'c9',
        'c10',
        'c11',
        'c12',
    ];
     
}

