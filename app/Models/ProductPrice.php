<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;

    protected $table = 'product_price';

    // Relation to Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}