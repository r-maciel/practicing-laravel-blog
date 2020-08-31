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
        <style>
        	.header{
        		height: 70px;
        		padding: 10px 0 0 20px;
        	}
        	.header a{
        		font-size: 25px;
        	}
        	.body{
        		height: calc(100vh - 70px);
        		display: flex;
        		justify-content: center;
        		align-items: center;
        	}
        </style>
    </head>
    <body>
        <div class="header"><a class="navbar-brand" href="{{ route('principal') }}">CoolBlogger</a></div>
        <div class="body"><h1>Page Not Found :(</h1></div>
    </body>
</html>
