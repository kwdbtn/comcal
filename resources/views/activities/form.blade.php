@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justified-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>
                        <strong>{{ $activity->exists ? "Editing Activity" : "New Activity" }}</strong>
                        <span>
                            <a href="{{ route('activities.index') }}" class="btn btn-sm btn-dark float-end">Back</a>
                        </span>
                    </h4>
                    <hr>

                    {!! Form::model($activity, ['method' => $activity->exists ? 'PUT' : 'POST', 
                    'route' => $activity->exists ? ['activities.update', $activity] : ['activities.store'],
                    'class' => 'form-horizontal', 'enctype' => 'Multipart/form-data', 'files'=>true])
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
                        {!! Form::label('priority', 'Priority:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('priority', $arr['priority'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                            {!! Form::label('due_date', 'Due Date:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                {!! Form::text('due_date', null, ['class'=>'form-control datetimepicker-input col-md-12 col-xs-12','placeholder'=>'Due Date', 'data-target'=>'#datetimepicker7', 'data-toggle'=>"datetimepicker", 'required']) !!}
                                <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                    <div class="input-group-text form-control"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group row mt-1">
                        {!! Form::label('responsibility', 'Responsibility:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('responsibility', $arr['usergroups'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div> --}}

                    <div class="form-group row mt-1">
                        {!! Form::label('recipient', 'Responsibility:', ['class' => 'control-label col-sm-2 text-end']) !!}
                        <div class="col-sm-8">
                            {{Form::select('recipient', $arr['usergroups'], null, ['class' => 'form-control col-md-12 col-xs-12'])}}
                        </div>
                    </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('attachment', 'Attachment (PDF only):', ['class' => 'control-label col-sm-2 text-end']) !!}
                       <div class="col-sm-8 col-md-8">
                           <input name="attachment" type="file" class="form-control col-md-7 col-xs-8 result-file">
                       </div>
                   </div>

                    <div class="form-group row mt-1">
                        {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-2 text-end'])
                        !!}
                        <div class="col-sm-8 col-md-8">
                            {!! Form::textarea('remarks', null,['class'=>'form-control col-md-7 col-xs-8
                            ','placeholder'=>'Remarks', 'rows'=>'4']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="offset-sm-2 mt-2">
                            <button type="submit" class="btn btn-sm btn-dark">{{ $activity->exists ? @"Update" : @"Add" }}</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection