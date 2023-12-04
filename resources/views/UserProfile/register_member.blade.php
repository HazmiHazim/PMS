@extends('layouts.app')

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
                    <h1>Register User</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Question</h3>

                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('user.member_register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label><b>Member ID</b></label>
                                <input type="text" name="umpid" class="form-control" placeholder="Member ID" />
                                @if($errors->has('umpid'))
                                    <span class="text-danger">{{ $errors->first('umpid')}}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label><b>Select Role:</b></label>
                                <select id="role" name="role">
                                    <option name="role" selected>Student</option>
                                    <option name="role" >Lecturer</option>
                                    <option name="role" >Dean</option>
                                    <option name="role" >PETAKOM Committee</option>
                                    <option name="role" >Head of Student Development</option>
                                </select>
                                @if($errors->has('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span>
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
