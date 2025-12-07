<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'sku',
        'stock',
        'barcode',
        'barcode_image',
        'storage_location',
        'supplier_id',
        'price',
        'description',
    ];

    // Relasi ke Supplier
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }
}
