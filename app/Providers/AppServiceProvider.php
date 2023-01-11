<?php

namespace App\Providers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if (auth()->check()) {
            $activities = Activity::all();

            foreach ($activities as $activity) {
                $today = Carbon::today();
                $somedate = Carbon::parse($activity->due_date);

                if ($somedate->lessThanOrEqualTo($today)) {
                    $activity->update([
                        'due' => true,
                    ]);
                } else {
                    $activity->update([
                        'due' => false,
                    ]);
                }
            }
        }
    }
}
