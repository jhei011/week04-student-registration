<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Registration System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f0e8] min-h-screen">
    <nav class="bg-[#4a6a4a] text-white px-6 py-4 flex items-center justify-between shadow">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/>
                </svg>
            </div>
            <span class="font-semibold text-sm tracking-wide">Student Registration System</span>
        </div>
        <div class="flex items-center gap-2 text-sm text-white/80">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
            New Student
        </div>
    </nav>
    @yield('content')
</body>
</html>
