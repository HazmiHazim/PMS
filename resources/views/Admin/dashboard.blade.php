@extends('Admin.main')

@section('title', 'Dashboard')

@section('content')

    <div class="flex relative justify-center text-center items-center h-full w-full">
        <main class="bg-gray-100 h-screen w-full overflow-y-auto">
            <section v-if="active === 'performance'" id="performance">
                <header class="border-b border-solid border-gray-300 bg-white">
                    <h2 class="p-6">Dashboard</h2>
                </header>
                <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                    <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                        Buildings Overview
                    </header>
                    <section class=" flex flex-row flex-wrap items-center text-center border-b border-solid border-gray-300">
                        <div
                            class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                            <span class="text-xs font-medium text-gray-500 uppercase">TOTAL REVENUE</span>
                            <div class="py-4 flex items-center justify-center text-center">
                                <span class="mr-4 text-3xl">$485,985</span>
                                <span
                                    class="inline-flex items-center bg-green-500 h-6 px-2 rounded text-white text-xs">+9.1%</span>
                            </div>
                        </div>
                        <div
                            class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                            <span class="text-xs font-medium text-gray-500 uppercase">PREDICTED MONTHLY REVENUE</span>
                            <div class="py-4 flex items-center justify-center text-center">
                                <span class="mr-4 text-3xl">$6,576</span>
                                <span
                                    class="inline-flex items-center bg-green-500 h-6 px-2 rounded text-white text-xs">+12.0%</span>
                            </div>
                        </div>
                        <div
                            class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r">
                            <span class="text-xs font-medium text-gray-500 uppercase">ACTIVE RENTERS</span>
                            <div class="py-4 flex items-center justify-center text-center">
                                <span class="mr-4 text-3xl">152</span>
                                <span
                                    class="inline-flex items-center bg-red-500 h-6 px-2 rounded text-white text-xs">-12</span>
                            </div>
                        </div>
                        <div
                            class="p-4 w-full sm:w-1/2 lg:w-1/4 border-b border-solid border-gray-300 md:border-b-0 sm:border-r flex flex-col items-center">
                            <span class="text-xs font-medium text-gray-500 uppercase">PENDING RENTS</span>
                            <span class="block py-4 text-gray-500 text-3xl">$930,10</span>

                        </div>
                    </section>
                    <section id="chart" class="p-4">
                        <canvas id="myChart" width="200" height="200"></canvas>
                    </section>
                </section>

                <div class="flex flex-wrap flex-row">
                    <div class="w-full lg:w-1/2">
                        <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                            <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                Most Profitable Renters
                            </header>
                            <section class="overflow-x-auto w-full">
                                <table class="w-full" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-red-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        A</div>
                                                    <div class="text-gray-700">Adobe</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $35,210.66</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-green-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        B</div>
                                                    <div class="text-gray-700">Bank of America</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $11,456.84</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-blue-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        L</div>
                                                    <div class="text-gray-700">Lamborghini Automobili</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $35,210.66</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-yellow-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        G</div>
                                                    <div class="text-gray-700">Google London</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $9,586.11</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </section>
                    </div>
                    <div class="w-full lg:w-1/2">
                        <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                            <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                                Latest Invoices
                            </header>
                            <section class="overflow-x-auto w-full">
                                <table class="w-full" cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-red-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        A</div>
                                                    <div class="text-gray-700">Adobe</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $35,210.66</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-green-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        B</div>
                                                    <div class="text-gray-700">Bank of America</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $11,456.84</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-blue-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        L</div>
                                                    <div class="text-gray-700">Lamborghini Automobili</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $35,210.66</td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 py-4 border-b border-solid border-gray-300">
                                                <div class="pl-4 flex flex-wrap flex-row items-center">
                                                    <div
                                                        class="mr-4 h-12 w-12 bg-yellow-600 rounded-full block flex  flex-row justify-center items-center text-white">
                                                        G</div>
                                                    <div class="text-gray-700">Google London</div>
                                                </div>

                                            </td>
                                            <td
                                                class="text-right p-2 pr-4 border-b border-solid border-gray-300 text-gray-700">
                                                $9,586.11</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        </section>
                    </div>
            </section>

            <section v-if="active === 'new'" id="new">
                <header class="border-b border-solid border-gray-300 bg-white">
                    <h2 class="p-6">New</h2>
                </header>
            </section>
    </div>
    </main>
    </div>

@endsection