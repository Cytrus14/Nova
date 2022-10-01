<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    // Relation to User
    public function user() {
        return $this->belongsTo(User::class);
    }
    // Relation to Product (Many to many relation)
    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}