<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('stylesheet')
    <title>@yield('title')</title>

</head>
<body>
<div class="wrapper">
    @include('components.navbar')
    @include('components.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('components.footer')
</div>

@yield('scripts')
</body>
</html>
