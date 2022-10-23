<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'comment', 'rating', 'product_id', 'user_id'];
    protected $table = 'product_review';

    // Relation to User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relation to Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
}