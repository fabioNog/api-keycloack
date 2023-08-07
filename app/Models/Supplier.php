<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'short_name', 'code', 'cnpj', 'status', 'int_flag', 'int_date'];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id', 'id');
    }
}
