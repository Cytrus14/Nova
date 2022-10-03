<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    // Relation to ProductReview
    public function productReviews() {
        return $this->hasMany(ProductReview::class);
    }
    // Relation to ProductImage
    public function productImages() {
        return $this->hasMany(ProductImage::class);
    }
    // Relation to ProductPrice
    public function productPrices() {
        return $this->hasMany(ProductPrice::class);
    }
    public function productCategories() {
        return $this->hasMany(ProductCategory::class);
    }
    // Relation to Order (many to many relation)
    public function orders() {
        return $this->belongsToMany(Order::class);
    }
    // Get the current product price (the most recent one)
    public function getCurrentPriceAttribute() {
        $price = $this->productPrices->sortByDesc('validFrom')->first();
        return $price->priceEuros . '.' . $price->priceCents;
    }
}