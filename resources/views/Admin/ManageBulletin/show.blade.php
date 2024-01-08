<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $announcement->title }}</title>
</head>

<body>

    <header>
        <div class="w-full bg-cover bg-center"
            style="height:20rem; background-image: url(https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80);">
            <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-70">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('images/public/logo.png') }}" class="px-4 py-2 object-fit-cover" width="350px"
                        height="350px">
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="h-full w-full px-12 py-6">
            <h1 class="text-blue-500 text-2xl font-semibold capitalize md:text-3xl">{{ $announcement->title }}</h1>
            <div class="mt-6 flex flex-col gap-10">
                <span>{{ $announcement->message }}</span>
                <span>Untuk maklumat lebih lanjut, sila layari pautan ini <a href="{{ $announcement->url_reference }}"
                        class="underline text-blue-500">here</a></span>
            </div>
        </div>
    </section>

</body>

</html>
