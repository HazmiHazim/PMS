@extends('Admin.main')

<!-- Google Font: Source Sans Pro -->
{{-- @section('stylesheet')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection --}}

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>PETAKOM Activities Dashboard</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Activity ID</th>
                            <th>Name</th>
                            <th>Club Name</th>
                            <th>Club advisor name</th>
                            <th>Organizer</th>
                            <th>Application type</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Organizer</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->ACTIVITY_ID }}</td>
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->category->name }}</td>
                                <td>{{ $activity->date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

@endsection
