<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilRekomendasi extends Model
{
    use HasFactory;

    protected $table = 'hasil_rekomendasi';

    protected $fillable = [
        'user_id', 
        'product_id',
        'n_bobot',
    ];

}
