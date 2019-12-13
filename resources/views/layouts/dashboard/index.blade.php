
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App | @yield('title', 'Welcome')</title>
    <link rel="stylesheet" href={{ asset('css/app.css') }}>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('layouts/dashboard/_navbar')

    @include('layouts/dashboard/_main_sidebar')

    @yield('content')  

    @include('layouts/dashboard/_control_sidebar')

    @include('layouts/dashboard/_footer')

</div>
<!-- ./wrapper -->
<script src={{ asset('js/app.js') }}></script>
</body>
</html>
