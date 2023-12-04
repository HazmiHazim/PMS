
@extends('layouts.app')

@section('title', 'Edit Activities')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css ') }}">
@endsection
@section('content')
<div class="card">
  <div class="card-header">Edit Activity Page</div>
  <div class="pull-right">
	<a class="btn btn-primary" href="{{ url('PtkActivity') }}"> Back</a>
</div>
  <div class="card-body">

    <form action="{{ url('PtkActivity/' .$activities->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <label>Activity ID</label></br>
        <input type="text" name="ACTIVITY_ID" id="ACTIVITY_ID" value="{{$activities->ACTIVITY_ID}}" class="form-control"></br>

        <label>Club Name</label></br>
        <input type="text" name="CLUB_NAME" id="CLUB_NAME" value="{{$activities->CLUB_NAME}}" class="form-control"></br>

        <label>Advisor Club Name</label></br>
        <input type="text" name="ADVISOR_CLUB_NAME" id="ADVISOR_CLUB_NAME" value="{{$activities->ADVISOR_CLUB_NAME}}" class="form-control"></br>

		<label>Organizer</label></br>
        <input type="text" name="ORGANIZER" id="ORGANIZER" value="{{$activities->ORGANIZER}}" class="form-control"></br>

		<label>Application Type</label></br>
        <input type="text" name="APPLICATION_TYPE" id="APPLICATION_TYPE" value="{{$activities->APPLICATION_TYPE}}" class="form-control"></br>

		<label>Activity Name</label></br>
        <input type="text" name="ACTIVITY_NAME" id="ACTIVITY_NAME" value="{{$activities->ACTIVITY_NAME}}" class="form-control"></br>

		<label>Activity Type</label></br>
        <input type="text" name="ACTIVITY_TYPE" id="ACTIVITY_TYPE" value="{{$activities->ACTIVITY_TYPE}}" class="form-control"></br>

		<label>Participant Number</label></br>
        <input type="number" name="PARTICIPANT_NUM" id="PARTICIPANT_NUM" value="{{$activities->PARTICIPANT_NUM}}" class="form-control"></br>

		<label>Venue</label></br>
        <input type="text" name="VENUE" id="VENUE" value="{{$activities->VENUE}}" class="form-control"></br>

		<label>Activity Start Date</label></br>
        <input type="date" name="ACTIVITY_STARTDATE" id="ACTIVITY_STARTDATE" value="{{$activities->ACTIVITY_STARTDATE}}" class="form-control"></br>

		<label>Activity End Date</label></br>
        <input type="date" name="ACTIVITY_ENDDATE" id="ACTIVITY_ENDDATE" value="{{$activities->ACTIVITY_ENDDATE}}" class="form-control"></br>

		<label>Activity Start Time</label></br>
        <input type="time" name="ACTIVITY_STARTTIME" id="ACTIVITY_STARTTIME" value="{{$activities->ACTIVITY_STARTTIME}}" class="form-control"></br>

		<label>Activity End Time</label></br>
        <input type="time" name="ACTIVITY_ENDTIME" id="ACTIVITY_ENDTIME" value="{{$activities->ACTIVITY_ENDTIME}}" class="form-control"></br>

		<label>Budget</label></br>
        <input type="number" name="BUDGET" id="BUDGET" value="{{$activities->BUDGET}}" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@endsection('content')

@section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection
