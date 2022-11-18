<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_address';
    protected $fillable = ['name', 'phoneNumber', 'street', 'streetNumber', 'apartmentNumber', 'zipCode', 'city', 'country', 'user_id'];

    // Relation to User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relation to Order
    public function orders() {
        return $this->hasMany(Order::class);
    }
}