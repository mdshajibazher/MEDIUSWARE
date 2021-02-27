<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function Variant(){
        return $this->hasMany(ProductVariant::class);
    }


    public function VariantPrice(){
        return $this->hasMany(ProductVariantPrice::class);
    }
}
