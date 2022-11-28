<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function(User $user) {
            return $user->is_admin;
        });

        Gate::define('show-order', function(User $user, Order $order) {
            return $user->id == $order->user_id || $user->is_admin;
        });

        Gate::define('store-product-review', function(User $user, $productID) {
            return in_array($productID, $user->getPurchasedProductsIDs());
        });

        Gate::define('update-product-review', function(User $user, ProductReview $productReview) {
            return $user->id == $productReview->user_id || $user->is_admin;
        });

        Gate::define('delete-user-address', function(User $user, UserAddress $userAddress) {
            return $user->id == $userAddress->user_id || $user->is_admin;
        });

        Gate::define('edit-user', function(User $user, User $user2) {
            return $user->id == $user2->id || $user->is_admin;
        });

        Gate::define('update-user', function(User $user, User $user2) {
            return $user->id == $user2->id || $user->is_admin;
        });
    }
}
