<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo</title>

    <!-- include css-->
    @include('libraries.styles')
</head>
<body style="background-color:rgb(44, 44, 44);">
    @include('components.nav')

    @yield('content')

    <!-- include js-->
    @include('libraries.scripts')
</body>
</html>
