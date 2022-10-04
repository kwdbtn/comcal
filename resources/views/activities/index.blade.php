@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $title }}
                @role('Creator|Editor|SuperAdmin')
                    <span class="float-right"><a href="{{ route('activities.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
                @endrole
            </h4> <hr>

            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Responsibility</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($activities->isEmpty())
                            @else @foreach ($activities as $activity)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td style="{{ $activity->status == "Completed" ? "text-decoration:line-through;" : "" }}">
                                    <a class="activity-link" href="{{ route('activities.show', $activity) }}">
                                        {{ $activity->description }}
                                    </a>
                                </td>
                                <td style="{{ $activity->priority == "High" ? "color:red;" : "" }} {{ $activity->status == "Completed" ? "text-decoration:line-through;" : "" }}">{{ $activity->priority }}</td>
                                <td style="{{ $activity->due ? "color:red;" : "" }} {{ $activity->status == "Completed" ? "text-decoration:line-through;" : "" }}">{{ $activity->due ? "Yes" : "No" }}</td>
                                <td style="{{ $activity->due ? "color:red;" : "" }} {{ $activity->status == "Completed" ? "text-decoration:line-through;" : "" }}">{{ \Carbon\Carbon::parse($activity->due_date)->toFormattedDateString() }}</td>
                                <td style="{{ $activity->status == "Completed" ? "text-decoration:line-through;" : "" }}">{{ $activity->user_group->name }}</td>
                                <td>{{ $activity->status }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-primary">View</a>
                                        
                                        @if ($activity->status == "Not Started")
                                            <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection