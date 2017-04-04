<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('partials._head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            @include('partials._nav')
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    @include('partials._scripts')
</body>
</html>
