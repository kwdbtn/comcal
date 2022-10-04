@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body pb-2">
                    <h6>
                        <strong><span style="color: red">|</span>Activity</strong>
                        <div class="btn-toolbar float-end" role="toolbar" aria-label="Toolbar with button groups">
                            {{-- <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-primary">Update Activity</a>
                            </div> --}}
                            <div class="btn-group me-2" role="group" aria-label="Basic mixed styles example">
                                {{-- <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a> --}}
                                <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-dark float-end">Back</a>
                            </div>
                        </div>
                    </h6>
                    <small>{{ $activity->priority }} Priority | {{ $activity->status }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 pr-0 mr-0">
                    <div class="card mt-0">
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2 text-end']) !!}
                                <div class="col-sm-10">
                                    <h6>{!! Form::label('description', $activity->description, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}</h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-2 text-end']) !!}
                                <div class="col-sm-10">
                                    <h6>{!! Form::label('due_date', \Carbon\Carbon::parse($activity->due_date)->toFormattedDateString(), ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-2 text-end']) !!}
                                <div class="col-sm-10">
                                    <h6>{!! Form::label('remarks', $activity->remarks, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body">
                        {!! Form::model($activity, ['method' => $activity->exists ? 'PUT' : 'POST', 
                    'route' => $activity->exists ? ['activityactions.delegate', $activity] : ['activityactions.delegate', $activity],
                    'class' => 'form-horizontal'])
                    !!}

                    <div class="form-group row mt-1">
                        {!! Form::label('recipient', 'Delegate to:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('delegate', $arr['usergroups'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-2 mt-2">
                            <button type="submit" class="btn btn-sm btn-dark">{{ $activity->exists ? @"Update" : @"Save" }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    </div>
            </div>
            </div>

            
        </div>
    </div>
</div>
@endsection