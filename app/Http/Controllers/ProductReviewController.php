<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductReviewRequest;
use App\Http\Requests\UpdateProductReviewRequest;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductReviewController extends Controller
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
        return view("productReviews.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductReviewRequest $request)
    {   
        $validated = $request->validated();
        $productID = intval($request->all()['productID']);

        // check whether the given user has purchased the selected product
        if (!Gate::allows('store-product-review', $productID)) {
            abort(403);
        }

        $userID = $request->user()->id;

        ProductReview::create([
            'title' => $validated['title'],
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
            'product_id' => $productID,
            'user_id' => $userID
        ]);

        return redirect('products/' . $productID);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductReviewRequest  $request
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductReviewRequest $request, ProductReview $productReview)
    {
        if (!Gate::allows('update-product-review', $productReview)) {
            abort(403);
        }

        $validated = $request->validated();
        $productReview['rating'] = $validated['rating'];
        $productReview['title'] = $validated['title'];
        $productReview['comment'] = $validated['comment'];
        $productReview->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}
