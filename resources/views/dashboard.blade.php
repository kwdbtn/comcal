@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">

                {{------------------------------ All Activities ---------------------------------------}}
                <div class="col-md-12 mb-5">
                    <h4 class="text-center"><i class="fa fa-tasks" aria-hidden="true"></i> All Activities</h4>
                    <div class="row">
                        <div class="col-md-6" style="height: 100px">
                            <div class="card">
                                <div class="card-body">
                                    {!! $allActivitiesChart->container() !!}
                                    {!! $allActivitiesChart->script() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    {!! $dueAllActivitiesChart->container() !!}
                                    {!! $dueAllActivitiesChart->script() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{------------------------------ My Activities ---------------------------------------}}
                <div class="col-md-12 mb-5">
                    <h4 class="text-center"><i class="fa fa-list" aria-hidden="true"></i> My Activities</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    {!! $myActivitiesChart->container() !!}
                                    {!! $myActivitiesChart->script() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    {!! $dueMyActivitiesChart->container() !!}
                                    {!! $dueMyActivitiesChart->script() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{------------------------------ My Team Activities ---------------------------------------}}
                <div class="col-md-12">
                    <h4 class="text-center"><i class="fa fa-users" aria-hidden="true"></i> My Team</h4>
                    <div class="row">
                        <div style="overflow: auto; width: 100%; white-space: nowrap;">
                        @foreach ($teamCharts as $chart)
                            
                                <div class="col-md-4" style="display: inline-block;">
                                    <div class="card">
                                        <div class="card-body">
                                            {!! $chart->container() !!}
                                            {!! $chart->script() !!}
                                        </div>
                                    </div>
                                </div>
                            
                        @endforeach
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection