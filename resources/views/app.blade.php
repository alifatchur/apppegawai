<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <!-- CSS only -->
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>
    <div class="container">
        <div class="mt-4 p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
