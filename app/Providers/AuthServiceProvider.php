<?php

namespace App\Providers;

use App\Admin;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        /**
         * 檢查admin角色的權限
         * 如果是admin 返回true
         */
        $gate->define('isAdmin',function($admin){
            return $admin->user_type == 'admin';
        });

        /**
         * 檢查author角色的權限
         * 如果是author 返回true
         */
        $gate->define('isAuthor',function ($admin){
            return $admin->user_type =="author";
        });
    }
}
