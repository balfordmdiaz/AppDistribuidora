<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @include('partials.css')
   
    <style>
        .active a
        {
            color:red;
            text-decoration: none;
        }
    </style>

</head>
<body>
    @include('partials.nav')
    @yield('content')
    @include('partials.js')
</body>
</html>