<?php

namespace cacoma\Providers;

use cacoma\Invest;
use cacoma\Policies\InvestPolicy;
use cacoma\User;
use cacoma\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      Invest::class => InvestPolicy::class,
	  //User:class => UserPolicy::class,
        //'cacoma\Model' => 'cacoma\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //if($user->role != 'admin'){
          //Gate::define('update-post', function ($user, $post) {
            //return $user->id == $post->user_id;
          //});
        //}
		//para que somente o dono possa fazer update
        //Gate::define('update-post', function ($user, $post) {
        //return $user->id == $post->user_id;
		//ou
		//Gate::define('update-post', 'PostPolicy@update');
    }
}
