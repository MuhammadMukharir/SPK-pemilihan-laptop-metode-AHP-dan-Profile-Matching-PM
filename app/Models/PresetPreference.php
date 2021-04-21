<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresetPreference extends Model
{
    use HasFactory;

    protected $table = 'preset_preferences';

    protected $fillable = [
        'name', 
        'detail',
        'harga',
        'prosesor',
        'kapasitas_ram',
        'kapasitas_hdd',
        'kapasitas_ssd',
        'kapasitas_vram',
        'kapasitas_maxram',
        'berat',
        'ukuran_layar',
        'jenis_layar',
        'refresh_rate',
        'resolusi_layar'
    ];
}
