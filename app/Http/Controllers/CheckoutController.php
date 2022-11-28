<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function proceedToCheckout() {
        // dd(session('productQuantities'));
        return view('checkout.selectAddress');
    }

    public function previewOrder(Request $request) {
        if (!Auth::check()) {
            abort(403);
        }
        $validated = $request->validate([
            'selectedAddress' => ['required', 'numeric', 'min:0']
        ]);

        if (session('productsWithDetails') != null) {
            $selectedAddress = UserAddress::get()->where('id', 'equals', $validated['selectedAddress'])->first();
            session()->put('selectedAddress',$selectedAddress);
            return view('checkout.previewOrder', [
                'selectedAddress' => $selectedAddress,
                'products' => session('productsWithDetails'),
                'productQuantities' => session('productQuantities')
            ]);
        // if somehow the user managed to get here with an empty cart, return them to the home page
        } else {
            return view('homePage');
        }
    }
}
