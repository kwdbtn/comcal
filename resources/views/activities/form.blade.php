@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <strong>{{ $activity->exists ? "Editing '".$activity->name."'" : "New activity" }}</strong>
                        <span>
                            <a href="{{ route('activities.index') }}" class="btn btn-sm btn-dark float-end">Back</a>
                        </span>
                    </h4>
                    <hr>

                    {!! Form::model($activity, ['method' => $activity->exists ? 'PUT' : 'POST', 
                    'route' => $activity->exists ? ['activities.update', $activity] : ['activities.store'],
                    'class' => 'form-horizontal'])
                    !!}

                    <div class="form-group row">
                        {!! Form::label('description', 'Description:', ['class' => 'control-label col-sm-2 text-end'])
                        !!}
                        <div class="col-sm-8 col-md-8">
                            {!! Form::text('description', null,['class'=>'form-control col-md-7 col-xs-8
                            ','placeholder'=>'Description', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                            {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                {!! Form::text('due_date', null, ['class'=>'form-control datetimepicker-input col-md-12 col-xs-12','placeholder'=>'Due Date', 'data-target'=>'#datetimepicker7', 'required']) !!}
                                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                    <div class="input-group-text form-control"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('responsibility', 'Responsibility:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('responsibility', $arr['usergroups'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('recipient', 'Recipient/ Oversight Body:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('recipient', $arr['usergroups'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-2 mt-2">
                            <button type="submit" class="btn btn-dark">{{ $activity->exists ? @"Update" : @"Create" }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection