<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddressCard extends Component
{
    public $address;
    public $displayButtons;
    public $isSelected;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($address, $displayButtons, $isSelected)
    {
        $this->address = $address;
        $this->displayButtons = $displayButtons;
        $this->isSelected = $isSelected;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.address-card');
    }
}
