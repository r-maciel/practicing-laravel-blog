<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- Bootstrap --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        @include('partials.navbar')
        @yield('content')
        <footer class="d-flex justify-content-center mt-4 mb-4">
            <h3>Created By <a href="https://github.com/r-maciel">r-maciel</a></h3>
        </footer>
    </body>
</html>
