<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StarRating extends Component
{
    public $rating;
    public $maxRating = 5;
    /**
     * Create a new component instance.
     * @param  int $rating
     * @return void
     */
    public function __construct($rating)
    {   
        // check against incorrect values
        $rating = $rating < 0 ? $rating = 0 : $rating;
        $this->rating = floor($rating);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.star-rating');
    }
}
