@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>All Teams</strong>
                <span class="float-right"><a href="{{ route('usergroups.create') }}" class="btn btn-sm btn-dark float-end">Add New</a></span>
            </h4>

            <div class="table-responsive table-striped">
                <table class="table table-bordered table-myDataTable">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Team Lead</th>
                            <th scope="col">Team</th>
                            <th scope="col">Actions</th>
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
                                    <a href="{{ route('usergroups.show', $usergroup) }}"
                                    class="btn btn-sm btn-outline-primary">View</a>
                                    <a href="{{ route('usergroups.edit', $usergroup) }}"
                                    class="btn btn-sm btn-outline-info">Edit</a>
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