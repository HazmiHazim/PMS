@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection
@section('content')
<div class="row mt-4">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.changePassword') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label><b>New Password</b></label>
                        <input type="password" name="new_password" class="form-control" placeholder="New Password" />
                        @if($errors->has('new_password'))
                        <span class="text-danger">{{ $errors->first('new_password')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label><b>Confirm Password</b></label>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Re-Type Password" />
                        @if($errors->has('confirm_password'))
                        <span class="text-danger">{{ $errors->first('confirm_password')}}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Save"/>
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
