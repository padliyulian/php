<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  </head>
  <body>

    @include('layouts/navbar')

    @yield('main')
    
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>