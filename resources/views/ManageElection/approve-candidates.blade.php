@extends('layouts.app')

@section('title', 'Approve Candidate')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approve Candidate</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Candidates</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Candidate Name</th>
                        <th class="text-center">Status</th>
                        <th style="width: 2%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($candidates as $candidate)
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $candidate->candidate_detail->name }}</td>
                            <td class="text-center">
                                @switch($candidate->petakom_approval)
                                    @case(\App\Classes\Constants\ApprovalLevel::APPROVED)
                                        <span class="badge bg-success">approved</span>
                                        @break
                                    @case(\App\Classes\Constants\ApprovalLevel::PENDING)
                                        <span class="badge bg-warning">pending</span>
                                        @break
                                    @case(\App\Classes\Constants\ApprovalLevel::REJECTED)
                                        <span class="badge bg-danger">rejected</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('manage-election.approve-candidate', $candidate->candidate_id) }}">Approve candidate</a>
                                        <a class="dropdown-item" href="{{ route('manage-election.reject-candidate', $candidate->candidate_id) }}">Reject candidate</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

@endsection
