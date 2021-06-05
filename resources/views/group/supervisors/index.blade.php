@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Supervisors</li>
        </ol>
    </nav>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ route('supervisors.create') }}" class="btn btn-primary btn-icon-text">
            <i class="btn-icon-prepend" data-feather="plus"></i>
            Create Supervisor
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Supervisors</h6>
                <p class="card-description">All the supervisors are listed here.</p>
                <div class="table-responsive">
                    <table id="dataTableExample" class="table">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>

                                <th>
                                    Available Slots
                                </th>

                                <th>
                                    Pending Proposals
                                </th>

                                <th>
                                    Proposal
                                </th>
                                  <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($supervisors as $key => $supervisor)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $supervisor->user->name }}</td>
                                <td>{{ $supervisor->user->email }}</td>
                                <td>{{ $supervisor->slots }}</td>
                                <td>{{ $supervisor->pending_proposals }}</td>
                                <td>
                                @if (empty($is_accepted))
                                    <a href="{{ route('proposals.edit',$supervisor->id) }}"
                                        class="btn btn-info btn-icon-text">Send Proposal
                                        <i class="btn-icon-prepend" data-feather="edit"></i>
                                    </a>
                                    @else
                                    <button class="btn btn-info">Sent</button>
                                @endif
                                </td>
                                <td>
                                    @if (isset($is_accepted) && $is_accepted == 0)
                                    <button class="btn btn-info">Pending</button>
                                    @elseif (isset($is_accepted) && $is_accepted == 1)
                                    <button class="btn btn-success">Accepted</button>
                                    @else
                                    <button class="btn btn-danger">Rejected</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
