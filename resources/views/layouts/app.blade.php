<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('style')
</head>
<body class="container mx-auto mt-10 mb-10 max-w-lg " >

    <h1 class="text-3xl font-extrabold mb-4"> @yield('title') </h1>
    <div class=" font-serif" >

    @if (session()->has('success'))
        <div>{{session('success')}}</div>    
    @endif
        @yield('content')
    </div>
    
</body>
</html>