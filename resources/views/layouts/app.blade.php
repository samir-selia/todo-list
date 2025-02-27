<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf-8">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        @yield('styles')
        @yield('scripts')
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>