<!doctype html>
<html>

<head>
    @PwaHead

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Pemerintah Desa Wonoyoso</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body>


    <body>

        @include('components.nav-be')

        @include('components.menu')



        <div class="p-4 sm:ml-64">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">
                @yield('admin')

            </div>
        </div>




        @RegisterServiceWorkerScript


    </body>

</html>
