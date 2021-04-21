<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $fillable = [
        'user_id', 
        'product_id',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
