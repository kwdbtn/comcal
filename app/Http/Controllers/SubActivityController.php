<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\SubActivity;
use Illuminate\Http\Request;

class SubActivityController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Activity $activity) {
        $subactivities = $activity->subactivities();
        return view('subactivities.index', compact('subactivities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity, SubActivity $subactivity) {
        return view('subactivities.form', compact('activity', 'subactivity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Activity $activity) {
        $activity->subactivities()->create([
            'description' => $request->description,
            'due_date'    => date('Y-m-d', strtotime($request->due_date)),
            'remarks'     => $request->remarks,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubActivity  $subActivity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity, SubActivity $subactivity) {
        return view('subactivities.show', compact('activity', 'subactivity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubActivity  $subActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(SubActivity $subactivity) {
        return view('subactivities.form', compact('activity', 'subactivity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubActivity  $subActivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubActivity $subActivity) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubActivity  $subActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubActivity $subActivity) {
        //
    }
}
