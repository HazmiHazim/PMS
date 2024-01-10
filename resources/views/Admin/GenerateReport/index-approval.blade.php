@extends('layouts.app')

@section('title', 'Report Applicants')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    <div class="modal fade" id="show-status-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proposal Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="timeline">

                        <div>
                            <!-- Before each timeline item corresponds to one icon on the left scale -->
                            <i id="coo-icon" class=""></i>
                            <!-- Timeline item -->
                            <div class="timeline-item">
                                <!-- Header. Optional -->
                                <h3 id="coo-content" class="timeline-header"></h3>
                            </div>
                        </div>

                        <div>
                            <!-- Before each timeline item corresponds to one icon on the left scale -->
                            <i id="hosd-icon" class=""></i>
                            <!-- Timeline item -->
                            <div class="timeline-item">
                                <!-- Header. Optional -->
                                <h3 id="hosd-content" class="timeline-header"></h3>
                            </div>
                        </div>

                        <div>
                            <!-- Before each timeline item corresponds to one icon on the left scale -->
                            <i id="dean-icon" class=""></i>
                            <!-- Timeline item -->
                            <div class="timeline-item">
                                <!-- Header. Optional -->
                                <h3 id="dean-content" class="timeline-header"></h3>
                            </div>
                        </div>
                        <!-- The last icon means the story is complete -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Report Applications</h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">All Reports</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Report Title</th>
                        <th class="text-center">Status</th>
                        <th style="width: 2%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td>{{ ++$count }}</td>
                            <td>{{ $report->title }}</td>
                            <td class="text-center">
                                <i class="fas fa-info-circle" style="cursor: pointer;" onclick="statusReport({{ $report }})"></i>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Action</button>
                                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a class="dropdown-item" href="{{ route('manage-report.view', $report->ReportID) }}">View report</a>
                                        <a class="dropdown-item" href="{{ route('manage-report.approve', $report->ReportID) }}">Approve report</a>
                                        <a class="dropdown-item" href="{{ route('manage-report.reject', $report->ReportID) }}">Reject report</a>
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

    <script type="text/javascript">

        const REJECTED = 1;
        const PENDING = 2;
        const APPROVED = 3;

        function statusReport(data) {
            console.log(data);
            var coo_status = data.coordinator_approval;
            var hosd_status = data.hosd_approval;
            var dean_status = data.dean_approval;

            var coo_icon = $('#coo-icon');
            var coo_content = $('#coo-content');

            var hosd_icon = $('#hosd-icon');
            var hosd_content = $('#hosd-content');

            var dean_icon = $('#dean-icon');
            var dean_content = $('#dean-content');

            switch (coo_status) {
                case 1:
                    coo_icon.attr('class','fas fa-times bg-danger');
                    coo_content.text('Coordinator Denied Approval');
                    break;
                case 2:
                    coo_icon.attr('class','fas fa-exclamation bg-warning');
                    coo_content.text('Pending Coordinator Approval');
                    break;
                case 3:
                    coo_icon.attr('class','fas fa-check bg-success');
                    coo_content.text('Success Coordinator Approval');
                    break;
            }

            switch (hosd_status) {
                case 1:
                    hosd_icon.attr('class','fas fa-times bg-danger');
                    hosd_content.text('Head of Student Development Denied Approval');
                    break;
                case 2:
                    hosd_icon.attr('class','fas fa-exclamation bg-warning');
                    hosd_content.text('Pending Head of Student Development Approval');
                    break;
                case 3:
                    hosd_icon.attr('class','fas fa-check bg-success');
                    hosd_content.text('Success Head of Student Development Approval');
                    break;
            }

            switch (dean_status) {
                case 1:
                    dean_icon.attr('class','fas fa-times bg-danger');
                    dean_content.text('Dean Denied Approval');
                    break;
                case 2:
                    dean_icon.attr('class','fas fa-exclamation bg-warning');
                    dean_content.text('Pending Dean Approval');
                    break;
                case 3:
                    dean_icon.attr('class','fas fa-check bg-success');
                    dean_content.text('Success Dean Approval');
                    break;
            }

            $('#show-status-modal').modal('toggle')
        }
    </script>
@endsection
