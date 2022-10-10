<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use Illuminate\View\Component;

class AddProduct extends Component
{
    public $productCategories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->productCategories = ProductCategory::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.add-product');
    }
}
