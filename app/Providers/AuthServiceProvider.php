<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model\Absen' => 'App\Policies\PostPolicy',
        // 'App\Http\Controllers\AbsenController' => 'App\Policies\PostPolicy',
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('access-admin', function ($user) {
            return $user->level == '1';
        });
        
        Gate::define('access-user', function ($user) {
            return $user->level == '1' || $user->level == '0';
        });
        
        Gate::define('access-user2', function ($user) {
            return $user->level == '2' || $user->level == '1';
        });
        

        // Gate::define('isAuthor', function($user) {
        //     return $user->level == 1;
        // });

        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-post', [PostPolicy::class, 'delete']);
    }

}
