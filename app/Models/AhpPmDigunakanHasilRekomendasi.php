<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhpPmDigunakanHasilRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'nilai_ahp_pm_digunakan_hasil_rekomendasi';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',

        'bobot_harga',
        'bobot_prosesor',
        'bobot_kapasitas_ram',
        'bobot_kapasitas_hdd',
        'bobot_kapasitas_ssd',
        'bobot_kapasitas_vram',
        'bobot_kapasitas_maxram',
        'bobot_berat',
        'bobot_ukuran_layar',
        'bobot_jenis_layar',
        'bobot_refresh_rate',
        'bobot_resolusi_layar',

        'pref_harga',
        'pref_prosesor',
        'pref_kapasitas_ram',
        'pref_kapasitas_hdd',
        'pref_kapasitas_ssd',
        'pref_kapasitas_vram',
        'pref_kapasitas_maxram',
        'pref_berat',
        'pref_ukuran_layar',
        'pref_jenis_layar',
        'pref_refresh_rate',
        'pref_resolusi_layar',
    ];

}
