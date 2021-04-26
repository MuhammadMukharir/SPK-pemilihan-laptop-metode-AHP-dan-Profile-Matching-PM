<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AHP extends Model
{
    use HasFactory;

    protected $table = 'ahp';

    protected $primaryKey = 'id_perhitungan';

    protected $fillable = [
        'nama_perhitungan',
        'is_konsisten',
        'is_created_by_admin',
        'creator_id',
        'detail',
        
        
    ];
}
