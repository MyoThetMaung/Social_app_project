<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
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

        //if user is admin, allow all actions
        Gate::define('admin', function (User $user){
            return $user->isAdmin == 1;
        });

        Gate::define('adminPremiumPostowner', function(User $user,$id){
            $postOwner = Post::find($id)->user_id;
            return $user->isAdmin == '1' || $user->isPremium == '1' || $user->id == $postOwner;
        });
    }
}
