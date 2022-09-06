@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body pb-2">
                    <h6>
                        <strong><span style="color: red">|</span>Activity</strong>
                        <span>
                            <a href="{{ route('activities.index') }}" class="btn btn-sm btn-dark float-end">Back</a>
                        </span>
                    </h6>
                    <small>{{ $activity->description }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7 pr-0 mr-0">
                    <div class="card mt-0">
                        <div class="card-body">
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

            <div class="col-md-5 pl-0 ml-0">
                <div class="card mt-0">
                    <div class="card-body">
                        <h6>
                            <span>Sub-Activities</span>
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
    </div>
</div>
@endsection