<?php

namespace App\View\Components;

use App\Models\ProductCategory;
use App\Models\RecommendationTag;
use Illuminate\View\Component;

class AddProduct extends Component
{
    public $productCategories;
    public $priceTags;
    public $categoryTags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->productCategories = ProductCategory::all();
        $this->priceTags = RecommendationTag::get()->where('type', 'equals', 0);
        $this->categoryTags = RecommendationTag::get()->where('type', 'equals', 1);
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
