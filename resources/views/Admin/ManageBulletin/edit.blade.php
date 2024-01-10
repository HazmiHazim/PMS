@extends('Admin.dashboard')

@section('title', 'Edit Announcement')

@section('content')

    <div class="relative flex-col p-12 h-full w-full">

        @if (session('success-message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-message') }}</span>
            </div>
        @endif

        @error('error-message')
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Error!</span> {{ $message }}
            </div>
        @enderror

        <form action="{{ route('update-bulletin', $bulletin->bulletin_id) }}" method="POST">

            @method('PUT')

            @csrf

            <div class="flex flex-wrap -mx-3 mb-6">
                <label for="category" class="ml-5 font-bold text-2xl block mb-2 text-gray-900 dark:text-white">Select
                    category</label>
                <select id="category" name="category"
                    class="mb-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option disabled selected>Choose a category</option>
                    <option value="official">Official</option>
                    <option value="unofficial">Unofficial</option>
                </select>
                @foreach ($errors->get('category') as $error)
                    <div class="text-red-500">{{ $error }}</div>
                @endforeach

                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="title">
                        Title
                    </label>
                    <input
                        class="mt-2 mb-5 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                        type="text" placeholder="{{ $bulletin->title }}" name="title"
                        value="">
                    @foreach ($errors->get('title') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                </div>

                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="title">
                        Announcement Content
                    </label>
                    <textarea id="message" rows="4" name="message"
                        class="mb-5 block p-2.5 w-full text-sm resize-none text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="{{ $bulletin->message }}"></textarea>
                    @foreach ($errors->get('message') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                </div>

                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="title">
                        URL Reference
                    </label>
                    <input
                        class="mt-2 mb-5 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                        type="text" placeholder="{{ $bulletin->url_reference }}"
                        name="url_reference" value="">
                    @foreach ($errors->get('url_reference') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                </div>

                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="title">
                        Announcement Duration
                    </label>
                    <input
                        class="mt-2 mb-5 border-2 border-gray-200 px-3 py-2 block w-full rounded-lg text-base text-gray-900 focus:outline-none focus:border-indigo-500"
                        type="text" placeholder="{{ $bulletin->duration }}" name="duration" value="">
                    @foreach ($errors->get('duration') as $error)
                        <div class="text-red-500">{{ $error }}</div>
                    @endforeach
                </div>

                <div class="w-full">
                    <label class="block tracking-wide text-gray-700 font-bold mb-2 ml-5 text-2xl" for="title">
                        Announcement Expired Date
                    </label>
                    <div class="relative max-w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text" name="expired"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="{{ $bulletin->expired_at }}">
                        @foreach ($errors->get('expired') as $error)
                            <div class="text-red-500">{{ $error }}</div>
                        @endforeach
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
                </div>

                <div class="flex justify-end mt-10 h-full w-full">
                    <a href="{{ route('view-bulletin') }}"
                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Cancel</a>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ml-3">Update
                        Announcement</button>
                </div>

            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

        </form>

    </div>

@endsection
