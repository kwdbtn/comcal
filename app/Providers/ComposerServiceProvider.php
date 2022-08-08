<?php

namespace App\Providers;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('usergroups.form', function ($view) {

            $arr = [
                'users' => User::pluck('name', 'id'),
            ];

            $view->with('arr', $arr);
        });

        view()->composer('activities.form', function ($view) {

            $arr = [
                'usergroups' => UserGroup::pluck('name', 'id'),
            ];

            $view->with('arr', $arr);
        });
    }
}
