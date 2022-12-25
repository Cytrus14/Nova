<?php

namespace App\Http\Controllers;

use App\Models\Product;
use stdClass;

class ProductCartController extends Controller
{
    public function addProduct($id) {
        $existingProduct = null;
        $productInDB = Product::where('id', '=', $id)->first();
        $products = session('productsInCart');
        if ($products != null) {
            foreach($products as $product) {
                if ($product->id == $id) {
                    $existingProduct = $product;
                    break;
                }
            }
        }

        if ($existingProduct == null) {
            if ($productInDB->quantity > 0) {
                $product = new stdClass;
                $product->id = $id;
                $product->quantity = 1;
                session()->push('productsInCart', $product);
            }
        } else {
            if ($productInDB->quantity > $existingProduct->quantity) {
                $existingProduct->quantity++;
            }
        }

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
            return redirect('/cart/show');
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

    public function addProductAndGoToCart($id) {
        $this->addProduct($id);
        return $this->showCartContent();
    }

    public function increaseProductQuantity($id) {
        $products = session('productsInCart');
        if ($products != null) {
            foreach($products as $product) {
                if ($product->id == $id) {
                    $productInDB = Product::where('id', '=', $id)->first();
                    if ($productInDB->quantity > $product->quantity) {
                        $product->quantity++;
                    }
                    break;
                }
            }
        }
        return redirect('/cart/show');
    }

    public function decreaseProductQuantity($id) {
        $products = session('productsInCart');
        if ($products != null) {
            foreach($products as $product) {
                if ($product->id == $id) {
                    if ($product->quantity > 1) {
                        $product->quantity--;
                        break;
                    } else {
                        $this->removeProduct($product->id);
                        break;
                    }
                }
            }
        }
        return redirect('/cart/show');
    }

    public function goBack() {
        return redirect('/home');
    }
}
