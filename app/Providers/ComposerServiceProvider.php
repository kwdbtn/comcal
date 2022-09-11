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
                'priority'   => [
                    'Low'    => 'Low',
                    'Medium' => 'Medium',
                    'High'   => 'High',
                ],
            ];

            $view->with('arr', $arr);
        });

        view()->composer('layouts.app', function ($view) {
            $activitycount = 0;

            if (!is_null(auth()->user())) {
                $usergroups = auth()->user()->usergroups;

                foreach ($usergroups as $usergroup) {
                    $activitycount += $usergroup->activities->where('status', '<>', 'Completed')->count();
                }
            }

            $view->with('activitycount', $activitycount);
        });

        view()->composer('activityactions.form', function ($view) {

            $arr = [
                'status' => [
                    'In Progress' => 'In Progress',
                    'Completed'   => 'Completed',
                ],
            ];

            $view->with('arr', $arr);
        });
    }
}
