@extends('admin.main')

@section('title', 'Generate Report')

@section('content')
    <div class="relative flex-col p-12 h-full w-full">

        @if (session('success-message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success-message') }}</span>
            </div>
        @endif

        <div class="flex justify-between mb-5">
            <h1 class="text-2xl font-bold text-gray-700 px-6 md:px-0">Generate Report</h1>
            <a href="{{ route('create-report') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add
                Report</a>
        </div>

        <div class="flex-col mb-5">

            <label class="ml-5 font-bold text-2xl">Reports</label>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Report title
                            </th>
                            <th scope="col" class="px-6 py-3">
                                status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $report->title }}</th>
                                <td class="px-6 py-4">{{ $report->status }}</td>
                                <td class="px-6 py-4">{{ $report->action }}</td>
                                <td class="px-6 py-4">

                                <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                                <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mx-5">Edit</a>
                                    <!-- <a href="{{ route('view-edit-report', $report->reportID) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="inline-flex -space-x-px text-sm justify-end p-2 h-full w-full">
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page"
                                class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                        </li>
                        <li>
                            <a href="#"
                                class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                        </li>
                    </ul>
                </nav>


            </div>
        </div>

@endsection

<script type="text/javascript">

        const REJECTED = 1;
        const PENDING = 2;
        const APPROVED = 3;

        function statusReport(data) {
            console.log(data);
            var coo_status = data.coordinator_approval;
            var hosd_status = data.hosd_approval;
            var dean_status = data.dean_approval;

            var coo_icon = $('#coo-icon');
            var coo_content = $('#coo-content');

            var hosd_icon = $('#hosd-icon');
            var hosd_content = $('#hosd-content');

            var dean_icon = $('#dean-icon');
            var dean_content = $('#dean-content');

            switch (coo_status) {
                case 1:
                    coo_icon.attr('class','fas fa-times bg-danger');
                    coo_content.text('Coordinator Denied Approval');
                    break;
                case 2:
                    coo_icon.attr('class','fas fa-exclamation bg-warning');
                    coo_content.text('Pending Coordinator Approval');
                    break;
                case 3:
                    coo_icon.attr('class','fas fa-check bg-success');
                    coo_content.text('Success Coordinator Approval');
                    break;
            }

            switch (hosd_status) {
                case 1:
                    hosd_icon.attr('class','fas fa-times bg-danger');
                    hosd_content.text('Head of Student Development Denied Approval');
                    break;
                case 2:
                    hosd_icon.attr('class','fas fa-exclamation bg-warning');
                    hosd_content.text('Pending Head of Student Development Approval');
                    break;
                case 3:
                    hosd_icon.attr('class','fas fa-check bg-success');
                    hosd_content.text('Success Head of Student Development Approval');
                    break;
            }

            switch (dean_status) {
                case 1:
                    dean_icon.attr('class','fas fa-times bg-danger');
                    dean_content.text('Dean Denied Approval');
                    break;
                case 2:
                    dean_icon.attr('class','fas fa-exclamation bg-warning');
                    dean_content.text('Pending Dean Approval');
                    break;
                case 3:
                    dean_icon.attr('class','fas fa-check bg-success');
                    dean_content.text('Success Dean Approval');
                    break;
            }

            $('#show-status-modal').modal('toggle')
        }
    </script>