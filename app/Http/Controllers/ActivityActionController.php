<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityAction;
use Illuminate\Http\Request;

class ActivityActionController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity) {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity, ActivityAction $activityaction) {
        return view('activityactions.form', compact('activity', 'activityaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $activity) {
        $activity->actions()->create([
            'action_taken' => $request->action_taken,
            'challenge'    => $request->challenge,
            'actor'        => auth()->user()->id,
        ]);

        $activity->update([
            'status' => $request->status,
        ]);

        return redirect()->route('activities.show', $activity);
    }

    public function showdelegate(Activity $activity, ActivityAction $activityaction) {
        return view('activityactions.delegate', compact('activity', 'activityaction'));
    }

    public function delegate(Request $request, Activity $activity) {
        $activity->update([
            'delegate' => $request->delegate,
        ]);

        dd("Updated!");
        return redirect()->route('activities.show', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityAction  $action
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityAction $activityaction, Activity $activity) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityAction  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity, ActivityAction $activityaction) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityAction  $action
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityAction $activityaction) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityAction  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityAction $action) {
        //
    }
}
