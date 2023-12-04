@extends('layouts.app')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">
            <script>
                alert("{{ Session::get('message') }}")
            </script>
            <?php session()->forget('message'); ?>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h1>PETAKOM Bulletin Dashboard</h1>
                    </div>
                    <div class="card-body">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <a href="{{ route('manage-bulletin.index') }}" title="Bulletin"><button
                                    class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    Bulletin</button>
                            </a>
                            <a href="{{ route('manage-bulletin.add') }}" class="btn btn-success btn-sm"
                                title="Add Bulletin">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add Bulletin
                            </a>
                            <div class="card-tools">
                                <form action="{{ route('manage-bulletin.search') }}" method="GET">
                                    <input type="search" name="search">
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Posted by
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Expited Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bulletins as $bulletin)
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $bulletin->category }}</td>
                                            <td>{{ $bulletin->title }}</td>
                                            <td>{{ $bulletin->posted_by }}</td>
                                            <td>{{ $bulletin->created_at->toDateString() }}</td>
                                            <td>{{ $bulletin->expired_at }}</td>
                                            <td>
                                                <a href="{{ route('manage-bulletin.view', $bulletin->bulletin_id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                    View
                                                </a>
                                                <a href="{{ route('manage-bulletin.edit', $bulletin->bulletin_id) }}"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                    Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete?')"
                                                    href="{{ route('manage-bulletin.delete', $bulletin->bulletin_id) }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection