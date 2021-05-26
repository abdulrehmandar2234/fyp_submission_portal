@extends('layouts.backend')

@section('content')

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('supervisors.index') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create User</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Supervisors Form</h6>
                    <form class="forms-sample" method="POST" action="{{ route('supervisors.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name"> Project Title</label>
                            <input type="text" class="form-control" id="name" autocomplete="off"
                                   placeholder="Name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Project Description</label>
                            <input type="email" class="form-control" id="email" autocomplete="off"
                                   placeholder="Email" name="email">
                        </div>                                       
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('supervisors.index') }}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
