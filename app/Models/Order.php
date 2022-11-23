<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'isBooked', 'isCancelled', 'is_shipped', 'user_address_id'];
    protected $table = 'order';

    // Relation to User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relation to Product (Many to many relation)
    public function products() {
        return $this->belongsToMany(Product::class, 'product_order')->withPivot('productQuantity');
    }
    // Relation to UserAddress
    public function userAddress() {
        return $this->belongsTo(UserAddress::class);
    }

    // Get the order value
    public function getOrderValue() {
        $orderValue = 0;
        foreach($this->products as $product){
            $productQuantity = $product->pivot->productQuantity;
            $productPrice = $product->getPastProductPrice($this->created_at);
            $orderValue += $productQuantity * $productPrice; 
        }
        return $orderValue;
    }
}