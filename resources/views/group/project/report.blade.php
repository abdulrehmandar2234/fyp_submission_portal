@extends('layouts.backend')

@section('content')

<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Supervisors</li>
        </ol>
    </nav>   
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
                                    Title
                                </th>
                                <th>
                                    Supervisor
                                </th>
                                <th>
                                    Report
                                </th>                                
                                <th>
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->supervisor->name }}</td>
                                <td>
                                    @if (isset($is_accepted) && $is_accepted == 2)
                                    <a href="{{ url('group/project') }}"
                                        class="btn btn-info btn-icon-text">Resend Report
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
                                    @elseif (isset($is_accepted) && $is_accepted == 2)
                                    <button class="btn btn-danger">Rejected</button>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
