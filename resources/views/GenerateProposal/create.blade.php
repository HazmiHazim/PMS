@extends('layouts.app')

@section('title', 'Create Proposal')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Proposal</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Create Proposal</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('manage-proposal.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <input class="form-control" name="title" placeholder="Report Title">
                    </div>
                    <div class="form-group">
                    <textarea id="compose-textarea" name="proposal_content" class="form-control" style="height: 300px">
                    </textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                    </div>
                    <a href="{{ route('manage-proposal.index') }}" class="btn btn-default"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </form>

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


    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            //Add text editor
            $('#compose-textarea').summernote()
        })
    </script>
@endsection
