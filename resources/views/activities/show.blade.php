@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body">
                    <h6>
                        <strong><span style="color: red">|&nbsp;</span>Activity</strong>
                        <div class="btn-toolbar float-end" role="toolbar" aria-label="Toolbar with button groups">
                            @role('SuperAdmin')
                                <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('activities.send-email', $activity) }}" class="btn btn-sm btn-info">Send Email</a>
                                </div>
                            @endrole
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                @if ($activity->status != "Completed")
                                    <a href="{{ route('activityactions.create', $activity) }}" class="btn btn-sm btn-primary">Update Activity</a>
                                @endif
                            </div>

                            {{-- @if (is_null($activity->delegatex()))
                                <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                    @if ($activity->status != "Completed")
                                        <a href="{{ route('activityactions.showdelegate', $activity) }}" class="btn btn-sm btn-info">Delegate</a>
                                    @endif
                                </div>
                            @endif --}}
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                @role('Editor|SuperAdmin')
                                    <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a>
                                @endrole
                                <a href="{{ route('activities.index') }}" class="btn btn-sm btn-dark float-end">Back</a>
                            </div>
                        </div>
                    </h6>
                    <small>{{ $activity->priority }} Priority | {{ $activity->status }} | Due {{ \Carbon\Carbon::parse($activity->due_date)->diffForHumans(['options' => 0]) }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7" style="padding-right: 2px">
                    <div class="card">
                        <div class="card-body" style="height: 400px; overflow: auto">
                            <div class="form-group row">
                                {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('description', $activity->description, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}</h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('due_date', \Carbon\Carbon::parse($activity->due_date)->toFormattedDateString(), ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('responsibility', 'Responsibility:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('responsibility', $activity->user_group->name, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>

                            @if (!is_null($activity->delegatex()))
                            <div class="form-group row">
                                {!! Form::label('delegate', 'Delegated to:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('delegate', $activity->delegatex()->name, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            @endif

                            @if (!is_null($activity->attachment))
                            <div class="form-group row">
                                {!! Form::label('attachment', 'Attachment', ['class' => 'control-label col-sm-3 text-right']) !!}
                                <div class="col-sm-9">
                                    <strong>
                                        <a href="{{ route('activities.viewfile', $activity) }}" target="_blank"
                                            class='col-md-7 col-xs-12'>View
                                            Attachment
                                        </a>
                                    </strong>
                                </div>
                            </div>
                            <hr>
                            @endif

                            <div class="form-group row">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('remarks', (is_null($activity->remarks) ? "No remarks" : $activity->remarks), ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5" style="padding-left: 2px">
                <div class="card">
                    <div class="card-body" style="height: 400px; overflow: auto">
                        <h6>
                            <span>Sub-Activities ({{ $activity->subactivities->count() }})</span>
                            <span>
                                <a href="{{ route('subactivities.create', $activity) }}" class="btn btn-sm btn-primary float-end">Add</a>
                            </span>
                        </h6>
                        <hr>
                        <div class="form-group row">

                            @if ($activity->subactivities->isEmpty())
                                <span>No sub-activities</span>
                            @else
                                {{-- <ol> --}}
                                    @foreach ($activity->subactivities as $subactivity)
                                        <span><a href="{{ route('subactivities.show', [$activity, $subactivity]) }}">{{ $subactivity->description }}</a></span>
                                    @endforeach
                                {{-- </ol> --}}
                            @endif                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6" style="padding-right: 2px">
                    <div class="card">
                        <div class="card-body" style="height: 400px; overflow: auto">
                            <strong><span style="color: red">|&nbsp;</span>Updates</strong> <hr>

                            @if ($activity->actions->isEmpty())
                                No updates yet...
                            @else
                                @foreach ($activity->actions as $action)
                                    <h6>
                                        {{ $loop->iteration }}. {{ $action->action_taken }} <br>
                                        &emsp;<small>{{ $action->created_at }}</small> <br>
                                        &emsp;{{ $action->actorx()->name }}
                                    </h6>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 2px">
                    <div class="card">
                        <div class="card-body" style="height: 400px; overflow: auto">
                            <strong><span style="color: red">|&nbsp;</span>Audit Trail</strong> <hr>

                            @foreach ($auditlogs as $auditlog)
                                @if (!is_null($auditlog->causer))
                                    @if($auditlog->causer->name != "Kwadwo Akuamoah Boateng")
                                        @if ($auditlog->description == "updated") 
                                            ~ {{ $auditlog->causer->name }} {{ $auditlog->description }} this activity <br> {{-- from '{{ $auditlog->changes['old']['status'] }}' to '{{ $auditlog->changes['attributes']['status'] }}' @ {{ $auditlog->created_at }}<br> --}} 
                                        @else
                                            ~ {{ $auditlog->causer->name }} {{ $auditlog->description }} this activity @ {{ $auditlog->created_at }}<br>
                                        @endif
                                    @endif
                                @else 
                                    {{ $auditlog->description }} this activity @ {{ $auditlog->created_at }}<br>    
                                @endif

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection