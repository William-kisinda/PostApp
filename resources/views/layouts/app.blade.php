<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>PostApp</title>
</head>
<body class=" bg-gray-200">
    <nav class=" p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a href="/home" class="p-3">Home</a></li>
            <li><a href="/dashboard" class="p-3">Dashboard</a></li>
            <li><a href="/post" class="p-3">Post</a></li>
        </ul>
        <ul class="flex">
            <li>William Kisinda</li>
            <li><a href="/dashboard" class="p-3">Logout</a></li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>