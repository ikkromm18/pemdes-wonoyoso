<!doctype html>
<html>

<head>
    @PwaHead
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Pemerintah Desa Wonoyoso</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>

    @include('components.navbar')

    @yield('content')


    @include('components.footer')


    @RegisterServiceWorkerScript
</body>

</html>
