<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\View\Component;

class ProductList extends Component
{
    private $productsPerPage = 10;
    public $products;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-list');
    }
}
