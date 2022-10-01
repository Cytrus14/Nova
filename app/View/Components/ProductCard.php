<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $name;
    public $price;
    public $rating;
    public $isInStock;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $price, $rating, $isInStock, $description)
    {
        $this->name = $name;
        $this->price = $price;
        $this->rating = $rating;
        $this->isInStock = $isInStock;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}
