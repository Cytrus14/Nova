<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendationTag extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'value'];
    protected $table = 'recommendation_tag';

    // Relation to Product (many to many relation)
    public function products() {
        return $this->belongsToMany(Product::class, 'product_recommendation_tag');
    }
}
