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
                <div class="col-md-8 pr-0 mr-0">
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

            <div class="col-md-4 pl-0 ml-0">
                <div class="card mt-0">
                    <div class="card-body">
                        <h6>Activity</h6>
                        <hr>
                        <div class="form-group row">
                                {!! Form::label('created_at', 'Created:', ['class' => 'control-label col-sm-3']) !!}
                                <div class="col-sm-9">
                                    <h6>{!! Form::label('created_at', $activity->created_at, ['class'=>'control-label
                                        col-md-12
                                        col-xs-12'])
                                        !!}
                                    </h6>
                                </div>
                            </div>
                </div>
            </div>

                {{-- @if (auth()->user()->user_group->name != "Operators")
            <div class="pr-0 mt-2">
                <div class="card mt-0">
                    <div class="card-body">
                        @if($outage->status == "Pending" || $outage->status == "Dispatch Received" || $outage->status = "Planning Approved")
                        <form action="{{ route('outages.approve', $outage) }}" method="POST">
                            @csrf
                            {!! Form::label('remarks', 'Remarks:', ['class' => 'control-label col-sm-3']) !!}
                            <textarea name="remarks" id="" cols="30" rows="4" class="form-control"></textarea>

                            @if ($outage->status == "Pending")
                                @if (auth()->user()->user_group->name == "Dispatch")
                                    <Button type="submit" name="acknowledge" class="btn btn-sm btn-dark mt-1">Acknowledge</Button>
                                @endif

                                @if (auth()->user()->user_group->name == "Planning")
                                    <Button type="submit" name="approve" class="btn btn-sm btn-dark mt-1">Approve</Button>
                                @endif
                            @endif

                            @if ($outage->status == "Dispatch Received")
                                @if (auth()->user()->user_group->name == "Planning")
                                    <Button type="submit" name="approve" class="btn btn-sm btn-dark mt-1">Approve</Button>
                                @endif
                            @endif

                            @if ($outage->status == "Planning Approved")
                                @if (auth()->user()->user_group->name == "Planning")
                                    <Button type="submit" name="done" class="btn btn-sm btn-dark mt-1">Done</Button>
                                @endif
                            @endif
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endif --}}
        </div>
    </div>
</div>
@endsection