<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';
    protected $fillable = ['image_path', 'product_id'];

    // Relation to Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}