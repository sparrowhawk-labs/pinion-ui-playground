<!DOCTYPE html>
<html lang="ja" data-theme="lofi" data-tune="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinion-ui demo @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-base-100 text-base-content min-h-screen p-6">
    @yield('content')
</body>
</html>
