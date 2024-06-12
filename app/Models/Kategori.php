<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_kategori",   
    ];
    
    protected $hidden = [
        "created_at",
        "updated_at",
        "updater_id",
    ];

    public function Produk()
    {
        return $this->hasMany(Produk::class, 'id');
    }
}
