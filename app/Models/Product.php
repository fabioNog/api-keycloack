<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id', 'brand_id', 'category_id', 'sku', 'name', 'slug', 'description', 'body',
        'intellibrand_description', 'intellibrand_title', 'created_at', 'updated_at', 'deleted_at',
        'image', 'images', 'omnik_id', 'code', 'label', 'seqfornecedor', 'ddv_exception', 'lett_payload',
        'lett_title', 'lett_description', 'package_type', 'package_volume'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
