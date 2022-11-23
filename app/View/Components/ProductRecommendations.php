<?php

namespace App\View\Components;

use App\Models\RecommendationTag;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDO;

class ProductRecommendations extends Component
{
    public $recommendedProducts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $user = Auth::user();
        if ($user != null) {
            // get all tags of the user's purchased products
            $purchasedProductTags = array();
            $existingTagCount = count(RecommendationTag::all());
            $orders = $user->orders;
            foreach($orders as $order) {
                $products = $order->products;
                foreach($products as $product) {
                    $tags = $product->recommendationTags;
                    foreach($tags as $tag) {
                        $tagValue = $tag->value;
                        if(!in_array($tagValue, $purchasedProductTags)) {
                            array_push($purchasedProductTags, $tagValue);
                            // break all loops if all possible tag values are inside $purchasedProductTags
                            if(count($purchasedProductTags) == $existingTagCount) {
                                break 3;
                            }
                        }
                    }
                }
            }


            // This is the recommendation algorithm
            if (in_array("telescope", $purchasedProductTags)) {
                if (in_array("binoculars", $purchasedProductTags)) {
                    if (in_array("high", $purchasedProductTags)) {
                        $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                            $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                                ->orWhere('value', '=', 'binoculars-accessories');
                        })->whereRelation('recommendationTags','value', '=', 'high')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                    } elseif (in_array("medium", $purchasedProductTags)) {
                        $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                            $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                                ->orWhere('value', '=', 'binoculars-accessories');
                        })->whereRelation('recommendationTags','value', '=', 'medium')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                    } else {
                        $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                            $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                                ->orWhere('value', '=', 'binoculars-accessories');
                        })->whereRelation('recommendationTags','value', '=', 'low')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                    }
                } elseif (in_array("high", $purchasedProductTags)) {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars');
                    })->whereRelation('recommendationTags','value', '=', 'high')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                } elseif (in_array('medium', $purchasedProductTags)) {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars');
                    })->whereRelation('recommendationTags','value', '=', 'medium')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                } else {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars');
                    })->whereRelation('recommendationTags','value', '=', 'low')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                }
            } elseif (in_array('binoculars', $purchasedProductTags)) {
                if (in_array('high', $purchasedProductTags)) {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars-accessories');
                    })->whereRelation('recommendationTags','value', '=', 'high')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                } elseif (in_array('medium', $purchasedProductTags)) {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars-accessories');
                    })->whereRelation('recommendationTags','value', '=', 'medium')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                } else {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope')->orWhere('value', '=', 'universal-accessories')
                            ->orWhere('value', '=', 'binoculars-accessories');
                    })->whereRelation('recommendationTags','value', '=', 'low')->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
                }
            } elseif (in_array('binoculars-accessories', $purchasedProductTags) || in_array('telescope-accessories', $purchasedProductTags) || in_array('universal-accessories', $purchasedProductTags)) {
                    $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                        $query->where('value', '=', 'telescope')->orWhere('value', '=', 'binoculars');
                    })->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
            } else {
                $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
                    $query->where('value', '=', 'telescope')->orWhere('value', '=', 'binoculars')
                    ->orWhere('value', '=', 'universal-accessories');;
                })->where('quantity', '>', 0)->where('is_archived', '=', 'false')->get();
            }

            // sort all recommended product from highest to lowest rating
            $recommendedProducts = $this->sortProductsByRating($recommendedProducts);
            // recommend no more than 6 products
            $recommendedProducts = $recommendedProducts->slice(0, 6);
            $this->recommendedProducts = $recommendedProducts;

            // // All hail the glorious query
            // $recommendedProducts = Product::whereRelation('recommendationTags', function($query) {
            //     $query->where('value', '=', 'telescope-accessories')->orWhere('value', '=', 'universal-accessories')
            //         ->orWhere('value', '=', 'binoculars-accessories');
            // })->whereRelation('recommendationTags','value', '=', 'high')->where('quantity', '>', 0)
            // ->get();

            
            // foreach($recommendedProducts as $product) {
            //     dd($product->getAverageProductRating());
            // }

            // dd($recommendedProducts);
        } else {
            // if the costumer is not logged in don't recommend anything
            $this->recommendedProducts == null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
            return view('components.product-recommendations');
    }

    private function sortProductsByRating($products) {
        return $products->sortBy(function ($product) {
            return $product->getAverageProductRating();
        }, SORT_REGULAR, true);
    }
}
