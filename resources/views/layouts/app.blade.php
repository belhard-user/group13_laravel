<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name'))</title>
    @section('css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
</head>
<body>
@include('parts.navbar')
    <div id="app" class="container">
        @if(session()->has('flash'))
            <div class="alert alert-{{ session('flash.type', 'danger') }}">{{ session('flash.message') }}</div>
        @endif
        @yield('content')
    </div>
    @yield('ad')

    <!-- Scripts -->
    @section('js')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
    @yield('footer.js')
</body>
</html>
