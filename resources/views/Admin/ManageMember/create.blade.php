@extends('Admin.main')

@section('title', 'Create Member')

@section('content')

    <div class="relative flex-col p-12 h-full w-full">
        @if (session('success-message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-message') }}</span>
            </div>
        @endif

        <form action="{{ route('create-member') }}" method="POST">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        New Member ID
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="text" placeholder="CB20012" name="umpid" required>
                    @foreach ($errors->get('umpid') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach

                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        New Member Name
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="text" placeholder="Ali Bin Ahmad" name="name" required>
                    @foreach ($errors->get('name') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach

                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        New Member Email
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="email" placeholder="cb20012@umpsa.student.edu.my" name="email"
                        required>
                    @foreach ($errors->get('email') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                </div>


                <label for="role" class="ml-5 font-bold text-2xl block mb-2 text-gray-900 dark:text-white">Select
                    role</label>
                <select id="role" name="role"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Choose a role</option>
                    <option value="hosd">Head of Student Development</option>
                    <option value="dean">Dean</option>
                    <option value="lecturer">Lecturer</option>
                    <option value="ptkm_committee">PETAKOM Committee</option>
                    <option value="student">Student</option>
                </select>
                @foreach ($errors->get('role') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <div class="flex justify-end mt-10 h-full w-full">
                    <a href="{{ route('view-member-index') }}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Add
                        Member</button>
                </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
