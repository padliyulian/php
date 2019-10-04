<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>App | @yield('title', 'Home')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    </head>
    <body>

        @include('layouts/navbar')

        <main class="pt-4 mt-5">
            @yield('main')
        </main>

        @include('layouts/footer')
    
        <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>

    </body>
</html>