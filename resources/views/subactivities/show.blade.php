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
                            <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-dark float-end">Back</a>
                        </span>
                    </h6>
                    <small>{{ $activity->description }}</small>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 pr-0 mr-0">
                    <div class="card mt-0">
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('description', 'Sub-Activity:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('description', $subactivity->description, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}</h6>
                                </div>
                            </div>
                            <hr>

                            {{-- <div class="form-group row">
                                {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('due_date', \Carbon\Carbon::parse($subactivity->due_date)->toFormattedDateString(), ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                            <hr> --}}

                            <div class="form-group row">
                                {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('remarks', $subactivity->remarks, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-5 pl-0 ml-0">
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
                            <ol>
                                @foreach ($activity->subactivities as $subactivity)
                                    <li><a href="{{ route('subactivities.show', [$activity, $subactivity]) }}">{{ $subactivity->description }}</a></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection