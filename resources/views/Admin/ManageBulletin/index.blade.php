@extends('Admin.main')

@section('title', 'Bulletin')

@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <div class="relative flex-col p-12 h-full w-full">

        <div class="flex justify-between mb-5">
            <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0 mr-5">Bulletin Board</h1>
            @if (in_array(Auth()->user()->role, ['coordinator', 'dean', 'hosd', 'ptkm_committee', 'lecturer']))
                <a href="{{ route('view-create-bulletin') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">New
                    Announcement</a>
            @endif
        </div>

        <!-- component -->
        <div style='border-bottom: 2px solid #eaeaea'>
            <ul class="flex">
                <li class="flex-1 mr-2">
                    <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white"
                        href="{{ route('view-bulletin') }}">General</a>
                </li>
                <li class="flex-1 mr-2">
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                        href="{{ route('official-bulletin') }}">Official</a>
                </li>
                <li class="text-center flex-1">
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                        href="{{ route('unofficial-bulletin') }}">Unofficial</a>
                </li>
            </ul>
        </div>

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <tbody>
                                @if (!$bulletin->isEmpty() && $bulletin)
                                    @foreach ($bulletin as $news)
                                        @if (now() < $news->expired_at)
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                                    {{ date('j M', strtotime($news->created_at)) }}</td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <a class="text-decoration-line: underline text-blue-500"
                                                        href="{{ route('show-announcement', $news->bulletin_id) }}"
                                                        target="_blank">{{ $news->title }}</a>
                                                </td>
                                                @if (in_array(Auth()->user()->role, ['coordinator', 'dean', 'hosd', 'ptkm_committee', 'lecturer']))
                                                    <td class="whitespace-nowrap py-4">
                                                        <a href="{{ route('view-edit-bulletin', $news->bulletin_id) }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                                    </td>
                                                @endif
                                                @if (Auth()->user()->role === 'coordinator')
                                                    <td class="whitespace-nowrap py-4">
                                                        <button data-modal-target="delete-modal"
                                                            data-modal-toggle="delete-modal"
                                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                                            type="button">
                                                            Delete
                                                        </button>
                                                        <div id="delete-modal" tabindex="-1"
                                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                                            <div class="relative p-4 w-full max-w-md max-h-full">
                                                                <div
                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <button type="button"
                                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                        data-modal-hide="delete-modal">
                                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                    <div class="p-4 md:p-5 text-center">
                                                                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="none" viewBox="0 0 20 20">
                                                                            <path stroke="currentColor"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                        </svg>
                                                                        <h3
                                                                            class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                                            Are you sure you want to delete this Bulletin?
                                                                        </h3>
                                                                        <form class="inline-flex"
                                                                            action="{{ route('delete-bulletin', $news->bulletin_id) }}"
                                                                            method="POST">

                                                                            @method('DELETE')

                                                                            @csrf
                                                                            <button data-modal-hide="delete-modal"
                                                                                type="submit"
                                                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                                                Yes, I'm sure
                                                                            </button>
                                                                            <input type="hidden" name="_token"
                                                                                value="{{ csrf_token() }}">
                                                                        </form>
                                                                        <button data-modal-hide="delete-modal"
                                                                            type="button"
                                                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                                            cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">20 Jan</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">2 Feb</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">4 May</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">16 June</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">30 June</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">25 July</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">31 Aug</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">25 Sept</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">21 Oct</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">6 Nov</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">31 Dec</td>
                                        <td class="whitespace-nowrap px-6 py-4">Lorem ipsum dolor sit amet, consectetur
                                            adipiscing elit. Aenean consequat tristique odio, et tincidunt mauris cursus a.
                                            Duis
                                            non vestibulum eros. Ut vestibulum pharetra molestie</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
