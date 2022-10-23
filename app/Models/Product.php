<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['creationDate', 'name', 'quantity', 'description', 'thumbnail_path'];
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
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }
    // Relation to Order (many to many relation)
    public function orders() {
        return $this->belongsToMany(Order::class);
    }
    // Get the current product price (the most recent one)
    public function getCurrentPriceAttribute() {
        $price = $this->productPrices->sortByDesc('created_at')->first();
        if ($price->priceCents % 10 != 0)
            return $price->priceEuros . '.' . $price->priceCents;
        else
            return $price->priceEuros . '.' . '0' . $price->priceCents;
    }

    public function getAverageProductRating() {
        $productReviews = $this->productReviews()->get();
        $avg = 0;
        $count = 0;
        foreach($productReviews as $review) {
            $avg += $review['rating'];
            $count += 1;
        }
        if ($count > 0) {
            $avg = $avg / $count;
            return $avg;
        } else {
            return 0;
        }
    }

    public function getReviewsByRating($rating) {
        return $this->productReviews()->get()->where('rating', 'equals', $rating);
    }

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
}