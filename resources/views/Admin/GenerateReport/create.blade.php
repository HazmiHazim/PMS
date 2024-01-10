@extends('admin.main')

@section('title', 'Create Report')

@section('stylesheet')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
<div class="relative flex-col p-12 h-full w-full">
        @if (session('success-message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-message') }}</span>
            </div>
        @endif

        <form action="{{ route('store-report') }}" method="POST">
            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        Title
                    </label>
                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-password" type="text" placeholder="Report title" name="title" required>
                    @foreach ($errors->get('title') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach

                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="grid-password">
                        Content
                    </label>
                    <textarea id="grid-password" name="report_content" type="text" rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Message"></textarea>
                    @foreach ($errors->get('report_content') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach

                <div class="flex justify-end mt-10 h-25 w-full">
                    <a href="{{ route('manage-report') }}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Add
                        Report</button>
                </div>
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@endsection
