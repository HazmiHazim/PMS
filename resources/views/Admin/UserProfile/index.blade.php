@extends('Admin.main')

@section('title', 'My Profile')

@section('content')
    <div class="relative flex-col p-12 h-full w-full">

        @if (session('success-message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-message') }}</span>
            </div>
        @endif

        @if (session('error-message'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ session('error-message') }}</span>
            </div>
        @endif

        <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Account Settings</h1>
        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">

            @method('PUT')

            @csrf

            <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
                <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
                    <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Profile Info</h2>
                    <p class="text-xs text-gray-500">Update your basic profile information such as Name, Email Address and
                        Phone Number.</p>
                </div>
                <div class="md:w-2/3 w-full">
                    <div class="py-8 px-16">
                        <label for="umpid" class="text-sm text-gray-600">ID</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="text" value="{{ $user->umpid }}" disabled>
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="name" class="text-sm text-gray-600">Name</label>
                        @if ($user->role === 'coordinator')
                            <input
                                class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                                type="text" placeholder="Ali Bin Abu" value="{{ $user->name }}" name="name">
                        @else
                            <input
                                class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                                type="text" placeholder="Ali Bin Abu" value="{{ $user->name }}" disabled>
                        @endif
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="email" class="text-sm text-gray-600">Email Address</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="email" placeholder="cb20012@umpsa.student.edu.my" name="email"
                            value="{{ $user->email }}">
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="phone" class="text-sm text-gray-600">Phone Number</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="text" placeholder="0123456789" name="phone" value="{{ $user->phone }}">
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="address" class="text-sm text-gray-600">Home Address</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="text" placeholder="123 Main St Anytown, USA 12345" name="address"
                            value="{{ $user->address }}">
                    </div>
                </div>

            </div>
            <div class="flex p-16 py-4 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 justify-between">
                <p class="float-left text-xs text-gray-500 tracking-tight mt-2">Click on Save to update your Profile Info
                </p>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Save</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>


        <form action="{{ route('update-password') }}" method="POST" enctype="multipart/form-data">

            @method('PUT')

            @csrf

            <div class="w-full bg-white rounded-lg mx-auto mt-8 flex overflow-hidden rounded-b-none">
                <div class="w-1/3 bg-gray-100 p-8 hidden md:inline-block">
                    <h2 class="font-medium text-md text-gray-700 mb-4 tracking-wide">Password Change</h2>
                    <p class="text-xs text-gray-500">Update your password for better security of your account.</p>
                </div>
                <div class="md:w-2/3 w-full">
                    <div class="py-8 px-16">
                        <label for="old-password" class="text-sm text-gray-600">Old Password</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="password" placeholder="••••••••" name="old_password">
                        @foreach ($errors->get('old_password') as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="new-password" class="text-sm text-gray-600">New Password</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="password" placeholder="••••••••" name="new_password">
                        @foreach ($errors->get('new_password') as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    </div>
                    <hr class="border-gray-200">
                    <div class="py-8 px-16">
                        <label for="confirm-password" class="text-sm text-gray-600">Confirm Password</label>
                        <input
                            class="mt-2 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                            type="password" placeholder="••••••••" name="new_password_confirmation">
                        @foreach ($errors->get('new_password_confirmation') as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    </div>
                </div>

            </div>
            <div class="flex p-16 py-4 bg-gray-300 clearfix rounded-b-lg border-t border-gray-200 justify-between">
                <p class="float-left text-xs text-gray-500 tracking-tight mt-2">Click on Save to update your Password
                </p>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Save</button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

    </div>

@endsection
