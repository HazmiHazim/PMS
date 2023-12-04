@extends('layouts.app')

@section('title', 'View User')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

@endsection

@section('content')
<div class="row mt-4">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">My Profile</div>
            <div class="card-body">
                <form method="#" action="#">
                    @csrf
                    <div class="form-group mb-3">
                        <label>ID:</label>
                        <label>{{ Auth::user()->umpid }}</label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Name:</label>
                        <label>{{ Auth::user()->name }}</label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Email:</label>
                        <label>{{ Auth::user()->email }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Phone Number:</label>
                        <label>{{ Auth::user()->phone }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Address:</label>
                        <label>{{ Auth::user()->address }}<label>
                    </div>
                    <div class="form-group mb-3">
                        <a class="btn btn-primary d-inline" href="{{ route('edit') }}">Edit</a>
                        <a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
                    </div>
                </form>
            </div>
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
