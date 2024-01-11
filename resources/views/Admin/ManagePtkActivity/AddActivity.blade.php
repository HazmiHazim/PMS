
@extends('Admin.main')
@section('title', 'Add Activities')


@section('content')


<div class="relative flex-col p-12 h-full w-full">
    @if (session('success-message'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium">{{ session('success-message') }}</span>
        </div>
    @endif

    <form action="{{ route('activity-createActivity') }}" method="POST">
        @csrf

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full">
                {{-- <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Activity ID
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Activity ID" name="ACTIVITY_ID" required>
                @foreach ($errors->get('ACTIVITY_ID') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach --}}

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Club Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Petakom" name="CLUB_NAME" required>
                @foreach ($errors->get('CLUB_NAME') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Advisor Club Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Rina Harun" name="ADVISOR_CLUB_NAME"
                    required>
                @foreach ($errors->get('ADVISOR_CLUB_NAME') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Activity Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Activity Name" name="ACTIVITY_NAME" required>
                @foreach ($errors->get('ACTIVITY_NAME') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Activity Type
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Activity Type" name="ACTIVITY_TYPE" required>
                @foreach ($errors->get('ACTIVITY_TYPE') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Participant Number
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="Integer" placeholder="Participant Number" name="PARTICIPANT_NUM" required>
                @foreach ($errors->get('PARTICIPANT_NUM') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Vanue
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-password" type="text" placeholder="Vanue" name="VENUE" required>
                @foreach ($errors->get('VENUE') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <div date-rangepicker class="flex items-center">
                    <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input name="ACTIVITY_STARTDATE" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Activity Start Date">
                    </div>
                    <span class="mx-4 text-gray-500">to</span>
                    <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input name="ACTIVITY_ENDDATE" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Activity End Date">
                </div>
                </div>

                <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                    Start Time
                </label>
                        <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="text" placeholder="1400" name="ACTIVITY_STARTTIME" required>
                    @foreach ($errors->get('ACTIVITY_STARTTIME') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach

                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        End Time
                    </label>
                            <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-password" type="text" placeholder="1600" name="ACTIVITY_ENDTIME" required>
                        @foreach ($errors->get('ACTIVITY_ENDTIME') as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach

                {{-- <div class="relative" id="timepicker-max-time-pm" data-te-input-wrapper-init>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="form17" />
                    <label for="form17" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Activity Start Time</label>
                </div>

                <div class="relative" id="timepicker-max-time-pm" data-te-input-wrapper-init>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="form17" />
                    <label for="form17" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Activity End Time</label>
                </div> --}}

            </div>


            <label for="BUDGET" class="ml-5 font-bold text-2xl block mb-2 text-gray-900 dark:text-white">Budget</label>
            <select id="BUDGET" name="BUDGET"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option disabled selected>Budget Range</option>
                <option value="thousand">Less RM1000</option>
                <option value="fiveThousand">RM1000 - RM5000</option>
                <option value="eightThousand">RM5000 - RM8000</option>
                <option value="tenThousand">RM8000 - RM10,000</option>
                <option value="infinity">More Rm10,000</option>
            </select>
            @foreach ($errors->get('BUDGET') as $error)
                <div class="text-red-500">{{ $error }}</div>
            @endforeach

            <div class="flex justify-end mt-10 h-full w-full">
                <a href="{{ route('view-member-index') }}"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Add
                    Activity</button>
            </div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
{{--
<div class="card">
  <div class="card-header">Add Activity Page</div>
  <div class="pull-right">
	<a class="btn btn-primary" href="{{ url('PtkActivity') }}"> Back</a>
</div>
  <div class="card-body">

      <form action="" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Activity ID</label></br>
        <input type="text" name="ACTIVITY_ID" id="ACTIVITY_ID" class="form-control"></br>

        <label>Club Name</label></br>
        <input type="text" name="CLUB_NAME" id="CLUB_NAME" class="form-control"></br>

        <label>Advisor Club Name</label></br>
        <input type="text" name="ADVISOR_CLUB_NAME" id="ADVISOR_CLUB_NAME" class="form-control"></br>

		<label>Organizer</label></br>
        <input type="text" name="ORGANIZER" id="ORGANIZER" class="form-control"></br>

		<label>Application Type</label></br>
        <input type="text" name="APPLICATION_TYPE" id="APPLICATION_TYPE" class="form-control"></br>

		<label>Activity Name</label></br>
        <input type="text" name="ACTIVITY_NAME" id="ACTIVITY_NAME" class="form-control"></br>

		<label>Activity Type</label></br>
        <input type="text" name="ACTIVITY_TYPE" id="ACTIVITY_TYPE" class="form-control"></br>

		<label>Participant Number</label></br>
        <input type="number" name="PARTICIPANT_NUM" id="PARTICIPANT_NUM" class="form-control"></br>

		<label>Venue</label></br>
        <input type="text" name="VENUE" id="VENUE" class="form-control"></br>

		<label>Activity Start Date</label></br>
        <input type="date" name="ACTIVITY_STARTDATE" id="ACTIVITY_STARTDATE"  class="form-control"></br>

		<label>Activity End Date</label></br>
        <input type="date" name="ACTIVITY_ENDDATE" id="ACTIVITY_ENDDATE" class="form-control"></br>

		<label>Activity Start Time</label></br>
        <input type="time" name="ACTIVITY_STARTTIME" id="ACTIVITY_STARTTIME" class="form-control"></br>

		<label>Activity End Time</label></br>
        <input type="time" name="ACTIVITY_ENDTIME" id="ACTIVITY_ENDTIME" class="form-control"></br>

		<label>Budget</label></br>
        <input type="number" name="BUDGET" id="BUDGET" class="form-control"></br>

        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div> --}}

@endsection

{{-- @section('scripts')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
@endsection --}}
