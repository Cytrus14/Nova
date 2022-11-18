<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

        // dd(session('productsInCart'));
        return redirect()->back();
    }

    public function showCartContent() {
        $productsInCart = session('productsInCart');
        $productsWithDetails = null;
        $productQuantities = null;
        if ($productsInCart != null) {
            $productIDs = array();
            $productQuantities = array();
            foreach($productsInCart as $productInCart) {
                array_push($productIDs, $productInCart->id);
                $productQuantities[$productInCart->id] = $productInCart->quantity;
            }
            $productsWithDetails = Product::FindMany($productIDs);
        }
        session()->put('productQuantities', $productQuantities);
        session()->put('productsWithDetails', $productsWithDetails);
        
        return view('productsCart.cart', [
            'products' => $productsWithDetails,
            'productQuantities' => $productQuantities
        ]);
    }

    public function removeProduct($id) {
        $productsInCart = session('productsInCart');

        // if there is only one product in the cart
        if (count($productsInCart) == 1) {
            session()->forget('productsInCart');
            return redirect()->back();
        }
        // if there are more products in the cart
        $IDToRemove = -1;
        foreach($productsInCart as $productInCart) {
            $IDToRemove++;
            if ($productInCart->id == $id) {
                break;
            }
        }

        unset($productsInCart[$IDToRemove]);
        session()->forget('productsInCart');
        session()->put('productsInCart', $productsInCart);
        return redirect()->back();
    }
}
