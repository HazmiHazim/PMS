@extends('layouts.app')

@section('title', 'Candidates')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')

    <div class="modal fade" id="modal-error">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h4 class="modal-title">Error</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ session('error') }}</p>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Candidates</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('manage-election.register-candidate') }}" class="btn btn-block btn-success">
                                <i class="fa fa-plus"></i>
                                Register as Candidate
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
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

    @if(session('error'))
        <script type="text/javascript">
            $(function () {
                //Add text editor
                $('#modal-error').modal('show');
            })
        </script>
    @endif
@endsection
