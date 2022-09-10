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
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('activityactions.create', $activity) }}" class="btn btn-sm btn-primary">Update Activity</a>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ route('activities.index') }}" class="btn btn-sm btn-dark float-end">Back</a>
                            </div>
                        </div>
                    </h6>
                    <small>{{ $activity->priority }} Priority | {{ $activity->status }}</small>
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
                                    <h6>{!! Form::label('due_date', $activity->due_date, ['class'=>'control-label
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
                                    <h6>{!! Form::label('responsibility', $activity->responsibilityx()->name, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('recipient', 'Recipient/Oversight Body:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('recipient', $activity->recipientx()->name, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('remarks', $activity->remarks, ['class'=>'control-label
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
                                <a href="{{ route('subactivities.create', $activity) }}" class="btn btn-sm btn-dark float-end">Add</a>
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
                            @foreach ($activity->actions as $action)
                                <h6>
                                    {{ $loop->iteration }}. {{ $action->action_taken }} <br>
                                    &emsp;<small>{{ $action->created_at }}</small> <br>
                                    &emsp;{{ $action->actorx()->name }}
                                </h6>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 2px">
                    <div class="card">
                        <div class="card-body" style="height: 400px; overflow: auto">
                            <strong><span style="color: red">|&nbsp;</span>Audit Trail</strong> <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection