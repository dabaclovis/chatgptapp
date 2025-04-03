<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('incs.head')
<body>
    <div id="app">
       @include('authNav.user')
        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    @include('incs.foots')
</body>
</html>
