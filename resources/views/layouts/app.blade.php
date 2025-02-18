<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div class="container  min-w-[50vw] mt-10 min-h-[80vh] p-2 mx-auto" >
        @yield('content')
    </div>
</body>
</html>