<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chait_app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Chat</title>
</head>

<body>
    @yield('avedan')
    @yield('login')
    <div class="container mt-3">
        @yield('app')
    </div>
</body>
<script src="{{ asset('js/jquery-1.10.2.min.js') }} "></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@stack('newjs');
@stack('login_are_cript');
</html>
