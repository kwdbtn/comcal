<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use function PHPUnit\Framework\isNull;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity as AuditLog;

class ActivityController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (auth()->user()->hasRole('SuperAdmin')) {
            $activities = Activity::orderBy('created_at', 'desc')->get();
        } else {
            $activities = Activity::where('created_by', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        }

        $title = "All Activities";
        return view('activities.index', compact('activities', 'title'));
    }

    public function useractivities() {
        $activities = Activity::where('created_by', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $title      = "My Activities";
        return view('activities.index', compact('activities', 'title'));
    }

    public function inbox() {
        $inboxActivities = [];
        $title           = 'Activities assigned to me';

        $usergroups = auth()->user()->usergroups;

        foreach ($usergroups as $usergroup) {
            foreach ($usergroup->activities as $activity) {
                array_push($inboxActivities, $activity);
            }
        }

        $inboxActivities = new Collection($inboxActivities);
        $activities      = new Collection($inboxActivities->where('status', '<>', 'Completed')->all());

        return view('activities.index', compact('activities', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Activity $activity) {
        return view('activities.form', compact('activity'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request);
        $fileAttachment = $request->file('attachment');

        if (!isNull($fileAttachment)) {
            $filenameAttachment = 'activity' . time() . '.' . $fileAttachment->getClientOriginalExtension();
            $pathAttachment     = $fileAttachment->storeAs('AppFiles', $filenameAttachment);
        } else {
            $pathAttachment = null;
        }

        $activity = Activity::create([
            'description'   => $request->description,
            'priority'      => $request->priority,
            'due_date'      => date('Y-m-d', strtotime($request->due_date)),
            'user_group_id' => $request->recipient,
            'remarks'       => $request->remarks,
            'created_by'    => auth()->user()->id,
            'attachment'    => $pathAttachment,
        ]);

        $userGroup = $activity->user_group;

        foreach ($userGroup->users as $user) {
            $this->sendEmail($user, $activity);
        }

        // foreach ($activity->user_group )

        return redirect()->route('activities.show', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity) {
        $users = $activity->user_group->users;

        if ($users->contains(auth()->user()) && $activity->status == "Not Started") {
            activity()
                ->performedOn($activity)
                ->event('viewed')
                ->log('viewed');

            // $activity->update([
            //     'status' => "Started",
            // ]);
        }

        $auditlogs = AuditLog::where('subject_id', $activity->id)->get();

        return view('activities.show', compact('activity', 'auditlogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity) {
        return view('activities.form', compact('activity'));
    }

    public function viewfile(Activity $activity) {
        $file = storage_path('app/' . $activity->attachment);
        // return response()->file($file);
        return response()->make(file_get_contents($file), 200, [
            'Content-Type' => 'application/pdf', //Change according to the your file type
            'Content-Disposition' => 'inline; filename="' . $activity->attachment . '"',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity) {
        $fileAttachment = $request->file('attachment');

        if (!isNull($fileAttachment)) {
            $filenameAttachment = 'activity' . time() . '.' . $fileAttachment->getClientOriginalExtension();
            $pathAttachment     = $fileAttachment->storeAs('AppFiles', $filenameAttachment);
        } else {
            $pathAttachment = null;
        }

        $activity->update([
            'description'   => $request->description,
            'priority'      => $request->priority,
            'due_date'      => date('Y-m-d', strtotime($request->due_date)),
            'user_group_id' => $request->recipient,
            'status'        => $activity->status,
            'remarks'       => $request->remarks,
            'attachment'    => $pathAttachment,
        ]);

        return redirect()->route('activities.show', $activity);
    }

    public function sendEmail(User $recipient, Activity $activity) {
        $data = [
            'title'     => "Business Tracker",
            'activity'  => $activity,
            'recipient' => $recipient->name,
        ];

        \Mail::to($recipient->email)->send(new \App\Mail\ActivityMail($data));
        echo "Email has been sent!";
    }

    public function sendActivity(Activity $activity) {
        foreach ($activity->user_group->users as $user) {
            $this->sendEmail($user, $activity);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity) {
        //
    }
}
