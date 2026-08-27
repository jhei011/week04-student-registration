<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-700 text-white px-6 py-4 shadow">
        <h1 class="text-xl font-bold">Student Registration System</h1>
    </nav>
    <main class="max-w-4xl mx-auto py-8 px-4">
        @yield('content')
    </main>
</body>
</html>
