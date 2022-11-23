<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\View\Component;

class AdminTools extends Component
{
    public $products;
    public $orders;
    public $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = Product::where('is_archived', '=', 'false')->paginate(10);
        $this->orders = Order::paginate(10);
        $this->users = User::paginate(10);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-tools');
    }
}
