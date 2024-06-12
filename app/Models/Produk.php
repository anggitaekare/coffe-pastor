<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        "nama_produk",
        "id_kategori",
        "harga_produk",
        "gambar_produk",
        "updater_id",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "updater_id",
    ];

    public function produkName(): Attribute
    {
        return new Attribute(
            set: fn ($value) => strtolower($value),
        );
    }
    
    public function kategoris(){
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
    public $timestamps = false;

    
}
