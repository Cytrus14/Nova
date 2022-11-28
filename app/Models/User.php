<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'username',
        'firstName',
        'lastName',
        'phoneNumber',
        'isStoreManager'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relation to Order
    public function orders() {
        return $this->hasMany(Order::class);
    }
    // Relation to Address
    public function addresses() {
        return $this->hasMany(UserAddress::class);
    }
    // Relation to ProductReview
    public function productReviews() {
        return $this->hasMany(ProductReview::class);
    }

    public function getPaginatedOrders() {
       return $this->orders()->paginate(10);
    }

    public function getPurchasedProductsIDs() {
        $purchasedProducts = array();
        $orders = $this->orders;
        foreach ($orders as $order) {
            $products = $order->products;
            foreach ($products as $product) {
                if (!in_array($product['id'], $purchasedProducts)) {
                    array_push($purchasedProducts, $product['id']);
                }
            }
        }
        return $purchasedProducts;
    }

    public function getReviewedProductsIDs() {
        $productIDs = array();
        $productReviews = $this->productReviews;
        foreach($productReviews as $review) {
            array_push($productIDs, $review->product['id']);
        }
        return $productIDs;
    }

}