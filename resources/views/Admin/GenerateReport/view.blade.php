@extends('layouts.app')

@section('title', 'View Report')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Report</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">View Report</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h5>{{ $report->title }}</h5>
                </div>
                <div class="mailbox-read-message">
                    {!! $report->report_content !!}
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

                <a href="{{ route('manage-report.index') }}" class="btn btn-default">Back</a>
            </div>

            <!-- /.card-footer -->
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
