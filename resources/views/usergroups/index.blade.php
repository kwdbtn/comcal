@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">All Teams
                <span class="float-right"><a href="{{ route('usergroups.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
            </h4> <hr>

            <div class="table-responsive">
                <table class="table table-bordered table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Team Lead</th>
                            <th scope="col">Team</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($usergroups->isEmpty())
                            @else @foreach ($usergroups as $usergroup)
                            <tr scope="row">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $usergroup->name }}</td>
                                <td>{{ $usergroup->teamleader()->name }}</td>
                                <td>
                                    @foreach ($usergroup->users as $user)
                                        <span class="badge bg-primary">{{ $user->name }}</span>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('usergroups.show', $usergroup) }}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{ route('usergroups.edit', $usergroup) }}" class="btn btn-sm btn-warning">Edit</a>
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