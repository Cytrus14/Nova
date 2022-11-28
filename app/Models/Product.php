<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['creationDate', 'name', 'quantity', 'descriptionSummary', 'description', 'thumbnail_path', 'isArchived'];
    protected $table = 'product';
    protected $appends = 'rating';

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
        return $this->belongsToMany(Order::class, 'product_order')->withPivot('productQuantity');
    }
    // Relation to RecommendationTag (many to many relation)
    public function recommendationTags() {
        return $this->belongsToMany(RecommendationTag::class, 'product_recommendation_tag');
    }

    // Get the current product price (the most recent one) formatted as a string
    public function getCurrentPriceAttribute() {
        $price = $this->productPrices->sortByDesc('created_at')->first();
        if ($price->priceCents % 10 != 0)
            return $price->priceEuros . '.' . $price->priceCents;
        else
            return $price->priceEuros . '.' . '0' . $price->priceCents;
    }

    // Get past product price
    public function getPastProductPrice($timestamp) {
        $price = $this->productPrices()->where([['created_at', '<', $timestamp]])->orderBy('created_at')->first();
        return $price->priceEuros + $price->priceCents / 100;
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

    public function decreaseStock($value) {
        $this->quantity = $this->quantity - $value;
        if ($this->quantity >= 0) {
            $this->save();
            // value updated successfully
            return 0;
        } else {
            // Error: not enough product in stock
            return 1;
        }
    }

    public function getReviewByUser($userID) {
        return $this->productReviews()->where('user_id', '=', $userID)->first();
    }

    public function getPriceTag() {
        return $this->recommendationTags()->where('type', '=', 0)->first();
    }

    public function getCategoryTag() {
        return $this->recommendationTags()->where('type', '=', 1)->first();
    }

    public function scopeFilter($query, array $filters) {

        // negative words (words proceeded by '!') are combined using the AND operator
        // positive words are combine using the OR operator
        if($filters['search'] ?? false) {
            $negativeWords = array();
            $positiveWords = array();
    
            $words = explode(' ', request('search'));
            foreach($words as $word) {
                if (str_starts_with($word, '!')) {
                    $word = ltrim($word, '!');
                    array_push($negativeWords, $word);
                }
                else {
                    array_push($positiveWords, $word);
                }
            }
    
            foreach($positiveWords as $positiveWord) {
                $query->where('name', 'like', '%' . $positiveWord . '%')
                ->orWhere('descriptionSummary', 'like', '%' . $positiveWord . '%')
                ->orWhere('description', 'like', '%' . $positiveWord . '%');
            }

            foreach($negativeWords as $negativeWord) {
                $query->where('name', 'not like', '%' . $negativeWord . '%')
                ->where('descriptionSummary', 'not like', '%' . $negativeWord . '%')
                ->where('description', 'not like', '%' . $negativeWord . '%');
            }

        }

        //filter by product category
        if($filters['category'] ?? false) {
            $query->whereRelation('productCategories','categoryName', '=', request('category'));

        }
    }
}