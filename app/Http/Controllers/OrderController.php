<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        if (session('productsInCart') != null && session('selectedAddress') != null) {

            $productsInCart = session('productsInCart');

            foreach($productsInCart as $product) {
                // decrease ordered products stock
                $productEntity = Product::find($product->id);
                $updateError = $productEntity->decreaseStock($product->quantity);
                if($updateError == 1) {
                    session()->forget('productsInCart');
                    session()->forget('selectedAddress');
                    return view('checkout.orderError');
                }
            }

            $createdOrder = Order::create([
                'user_id' => $request->user()['id'],
                'isBooked' => true,
                'isCancelled' => false,
                'user_address_id' => session('selectedAddress')['id']
            ]);
    
            foreach($productsInCart as $product) {
                // handle the pivot table
                $createdOrder->products()->attach($product->id, ['productQuantity' => $product->quantity]);
            }


            // removing all product and order confirmation prevents the user for placing new orders each
            // page refresh
            session()->forget('productsInCart');
            session()->forget('selectedAddress');

            return view('checkout.orderConfirmed', [
                "createdOrder" => $createdOrder
            ]);
        } else {
            return redirect('products');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("order.show", [
            'order' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $fields = $request->all();
        if (array_key_exists('isPaid', $fields) && $fields['isPaid'] == 1) {
            $order->isBooked = true;
        }
        if (array_key_exists('isShipped', $fields) && $fields['isShipped'] == 1) {
            $order->is_shipped = true;
        }
        if (array_key_exists('isCancelled', $fields) && $fields['isCancelled'] == 1) {
            $order->isCancelled = true;
        }

        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
