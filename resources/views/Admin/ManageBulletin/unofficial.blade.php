@extends('Admin.main')

@section('title', 'Unofficial Announcement')

@section('content')
    <div class="relative flex-col p-12 h-full w-full">

        <div class="flex justify-between mb-5">
            <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0 mr-5">Unofficial Bulletin Board</h1>
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
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                        href="{{ route('view-bulletin') }}">General</a>
                </li>
                <li class="flex-1 mr-2">
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                        href="{{ route('official-bulletin') }}">Official</a>
                </li>
                <li class="text-center flex-1">
                    <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white"
                        href="{{ route('official-bulletin') }}">Unofficial</a>
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
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <a href="{{ route('view-edit-bulletin', $news->bulletin_id) }}"
                                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
