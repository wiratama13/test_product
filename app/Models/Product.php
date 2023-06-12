<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'no',
        'id_produk',
        'nama_produk',
        'harga',
        'kategori',
        'status'
    ];
}
