@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>{{ $title }}</strong>
                <span class="float-right"><a href="{{ route('activities.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
            </h4>

            <div class="table-responsive table-striped">
                <table class="table table-bordered table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Responsibility</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($activities->isEmpty())
                            @else @foreach ($activities as $activity)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('activities.show', $activity) }}">
                                        {{ $activity->description }}
                                    </a>
                                </td>
                                <td>{{ $activity->priority }}</td>
                                <td>{{ $activity->due_date }}</td>
                                <td>{{ $activity->responsibilityx()->name }}</td>
                                <td class="text-center">
                                    <a href="{{ route('activities.show', $activity) }}"
                                    class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('activities.edit', $activity) }}"
                                    class="btn btn-sm btn-info">Edit</a>
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