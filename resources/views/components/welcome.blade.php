{{-- {{-- resources/views/welcome.blade.php --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script>
        function handleImageError() {
            document.getElementById('screenshot-container')?.classList.add('!hidden');
            document.getElementById('docs-card')?.classList.add('!row-span-1');
            document.getElementById('docs-card-content')?.classList.add('!flex-row');
            document.getElementById('background')?.classList.add('!hidden');
        }
    </script>
</head>
<body class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <img
        id="background"
        class="absolute -left-20 top-0 max-w-[877px]"
        src="https://laravel.com/assets/img/welcome/background.svg"
        onerror="handleImageError()"
    />

    <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="flex lg:col-start-2 lg:justify-center">
                    {{-- Laravel Logo --}}
                    <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                        {{-- Your full SVG path here --}}
                    </svg>
                </div>
            </header>

            <div class="text-center">
                <h1 class="text-3xl font-bold">Welcome to Laravel</h1>

                @if($canLogin)
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
                @endif

                @if($canRegister)
                    <a href="{{ route('register') }}" class="ml-4 text-green-500 hover:underline">Register</a>
                @endif

                <p class="mt-4 text-sm">
                    Laravel Version: {{ $laravelVersion }} |
                    PHP Version: {{ $phpVersion }}
                </p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
