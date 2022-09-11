<?php

namespace App\Http\Controllers;

use App\Charts\AllActivitiesChart;
use App\Charts\DueAllActivitiesChart;
use App\Models\Activity;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // -------------------- All activities----------------------------------------------------------------------------

        $notStarted = Activity::where('status', 'Not Started')->count();
        $started    = Activity::where('status', 'Started')->count();
        $inProgress = Activity::where('status', 'In Progress')->count();
        $completed  = Activity::where('status', 'Completed')->count();

        $allActivitiesChart = new AllActivitiesChart;
        $allActivitiesChart->minimalist(true);
        $allActivitiesChart->displayLegend(true);
        $allActivitiesChart->labels(['Not Started', 'Started', 'In Progress', 'Completed']);
        $allActivitiesChart->dataset('All Activities', 'doughnut', [$notStarted, $started, $inProgress, $completed])
            ->backgroundColor([
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(38, 194, 129)',
            ]);

        // -------------------- My activities------------------------------------------------------------------------------

        $myActivities           = [];
        $myActivitiesNotStarted = 0;
        $myActivitiesStarted    = 0;
        $myActivitiesInProgress = 0;
        $myActivitiesCompleted  = 0;

        foreach (auth()->user()->usergroups as $usergroup) {
            $myActivitiesNotStarted += $usergroup->activities->where('status', 'Not Started')->count();
            $myActivitiesStarted += $usergroup->activities->where('status', 'Started')->count();
            $myActivitiesInProgress += $usergroup->activities->where('status', 'In Progress')->count();
            $myActivitiesCompleted += $usergroup->activities->where('status', 'Completed')->count();

            $myActivitiesChart = new AllActivitiesChart;
            $myActivitiesChart->minimalist(true);
            $myActivitiesChart->displayLegend(true);
            $myActivitiesChart->labels(['Not Started', 'Started', 'In Progress', 'Completed']);
            $myActivitiesChart->dataset('My Activities', 'doughnut', [$myActivitiesNotStarted, $myActivitiesStarted, $myActivitiesInProgress, $myActivitiesCompleted])
                ->backgroundColor([
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(38, 194, 129)',
                ]);
        }

        // -------------------- Team activities----------------------------------------------------------------------------

        $teamCharts = [];

        foreach (auth()->user()->usergroups as $usergroup) {
            $teamNotStarted = $usergroup->activities->where('status', 'Not Started')->count();
            $teamStarted    = $usergroup->activities->where('status', 'Started')->count();
            $teamInProgress = $usergroup->activities->where('status', 'In Progress')->count();
            $teamCompleted  = $usergroup->activities->where('status', 'Completed')->count();

            $teamActivityChart = new AllActivitiesChart;
            $teamActivityChart->title($usergroup->name);
            $teamActivityChart->minimalist(true);
            $teamActivityChart->displayLegend(true);
            $teamActivityChart->labels(['Not Started', 'Started', 'In Progress', 'Completed']);
            $teamActivityChart->dataset('Team Activities', 'doughnut', [$teamNotStarted, $teamStarted, $teamInProgress, $teamCompleted])
                ->backgroundColor([
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(38, 194, 129)',
                ]);

            array_push($teamCharts, $teamActivityChart);
        }

        // -------------------- Due - All activities----------------------------------------------------------------------------

        $dueAllActivites     = Activity::where('due', true)->count();
        $notDueAllActivities = Activity::where('due', false)->count();

        $dueAllActivitiesChart = new DueAllActivitiesChart;
        $dueAllActivitiesChart->minimalist(true);
        $dueAllActivitiesChart->displayLegend(true);
        $dueAllActivitiesChart->labels(['Due', 'Not Due']);
        $dueAllActivitiesChart->dataset('All Activities', 'doughnut', [$dueAllActivites, $notDueAllActivities])
            ->backgroundColor([
                'rgb(255, 0, 0)',
                'rgb(255, 205, 86)',
            ]);

        // -------------------- Due - My activities------------------------------------------------------------------------------

        $dueMyActivities    = [];
        $dueMyActivities    = 0;
        $notDueMyActivities = 0;

        foreach (auth()->user()->usergroups as $usergroup) {
            $dueMyActivities += $usergroup->activities->where('due', true)->count();
            $notDueMyActivities += $usergroup->activities->where('due', false)->count();

            $dueMyActivitiesChart = new DueAllActivitiesChart;
            $dueMyActivitiesChart->minimalist(true);
            $dueMyActivitiesChart->displayLegend(true);
            $dueMyActivitiesChart->labels(['Due', 'Not Due']);
            $dueMyActivitiesChart->dataset('My Activities', 'doughnut', [$dueMyActivities, $notDueMyActivities])
                ->backgroundColor([
                    'rgb(255, 0, 0)',
                    'rgb(255, 205, 86)',
                ]);
        }

        return view('dashboard', compact('allActivitiesChart', 'myActivitiesChart', 'teamCharts', 'dueAllActivitiesChart', 'dueMyActivitiesChart'));
    }
}
