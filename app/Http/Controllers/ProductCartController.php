<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ProductCartController extends Controller
{
    public function addProduct($id) {
        $existingProduct = null;
        $products = session('productsInCart');
        if ($products != null)
            foreach($products as $product) {
                if ($product->id == $id) {
                    $existingProduct = $product;
                    break;
                }
            }

        if ($existingProduct == null) {
            $product = new stdClass;
            $product->id = $id;
            $product->quantity = 1;
            session()->push('productsInCart', $product);
        } else {
            $existingProduct->quantity++;
        }

        dd(session('productsInCart'));
        return redirect()->back();
    }

    public function showCartContent() {

        return view('productsCart.cart');
    }
}
