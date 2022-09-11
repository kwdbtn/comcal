@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $title }}
                <span class="float-right"><a href="{{ route('activities.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
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
                                <td>
                                    <a class="activity-link" href="{{ route('activities.show', $activity) }}">
                                        {{ $activity->description }}
                                    </a>
                                </td>
                                <td>{{ $activity->priority }}</td>
                                <td>{{ $activity->due ? "Yes" : "No" }}</td>
                                <td>{{ \Carbon\Carbon::parse($activity->due_date)->toFormattedDateString() }}</td>
                                <td>{{ $activity->responsibilityx()->name }}</td>
                                <td>{{ $activity->status }}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('activities.show', $activity) }}" class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ route('activities.edit', $activity) }}" class="btn btn-sm btn-warning">Edit</a>
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