<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Tenu International' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-slate-50 text-slate-800">
    <header class="bg-blue-900 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-semibold">Tenu International</a>
            <nav class="space-x-4 text-sm">
                <a href="{{ route('home') }}" class="hover:text-blue-200">Home</a>
                <a href="{{ route('news.index') }}" class="hover:text-blue-200">News</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-200">Contact</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-blue-200">Admin</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-10">
        @if (session('success'))
            <div class="mb-6 rounded border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t">
        <div class="max-w-6xl mx-auto px-4 py-6 text-sm text-slate-500">
            © {{ now()->year }} Tenu International (天悠国际株式会社)
        </div>
    </footer>
</body>
</html>
