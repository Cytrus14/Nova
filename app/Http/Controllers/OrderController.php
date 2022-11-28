<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;

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
        if (!Gate::allows('show-order', $order)) {
            abort(403);
        }
        
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
        if (array_key_exists('isPaid', $fields)) {
            $order->isBooked = true;
        } else {
            $order->isBooked = false;
        }
        if (array_key_exists('isShipped', $fields)) {
            $order->is_shipped = true;
        } else {
            $order->is_shipped = false;
        }
        if (array_key_exists('isCancelled', $fields)) {
            $order->isCancelled = true;
        } else {
            $order->isCancelled = false;
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
