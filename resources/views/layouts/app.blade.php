<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MyApp') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        var x = name;
        console.log(name)
    </script>
</head>
<body>


    <div id="app">
        <!-- header -->
        @include('header')

        @yield('content')

        <!-- footer -->
        @include('footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="js/before.js"></script>
    <script src="js/myapp.js"></script>
    <script src="js/after.js"></script>
</body>
</html>
