<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(10)
        ]);
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->file());
        $validated = $request->validated();

        // handle the product thumbnail
        $productThumbnailPath = null;
        if ($request->hasFile('productThumbnail')) {
            $productThumbnailPath = $request->file('productThumbnail')->store('productThumbnails', 'public');
        }

        // add the new product to DB
        $createdProduct = Product::create([
            'name' => $validated['productName'],
            'quantity' => $validated['productQuantity'],
            'description' => $validated['productDescription'],
            'thumbnail_path' => $productThumbnailPath
        ]);

        // get the new product's price, process it and store in DB
        $price = explode('.', $validated['productPrice']);
        $priceEuros = "0";
        $priceCents = "00";
        if (count($price) == 2) {
            $priceEuros = $price[0];
            $priceCents = $price[1];
        } else {
            $priceEuros = $price[0];
        }
        ProductPrice::create([
            'priceEuros' => $priceEuros,
            'priceCents' => $priceCents,
            'product_id' => $createdProduct['id']

        ]);

        // associate crated product with selected categories
        $categoryIds = $validated['productCategories'];
        foreach($categoryIds as $categoryId) {
            $createdProduct->productCategories()->attach($categoryId);
        }

        // handle additional product images
        if ($request->hasFile('productImages')) {
            foreach($request->file('productImages') as $productImage) {
                $productImagePath = $productImage->store('productImages', 'public');
                ProductImage::create([
                    'image_path' => $productImagePath,
                    'product_id' => $createdProduct['id']
                ]);
            }
        }


        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
