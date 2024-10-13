<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Post Display</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <div class="container mx-auto px-4 py-8">
        @if (Route::has('login'))
            <div class="fixed top-0 right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto py-12">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100 mb-8 text-center">Latest Posts</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($post as $row)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{$row->title}}</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{$row->description}}</p>
                    <a href="{{ url('/post/show/'.$row->id) }}"
                       class="mt-4 inline-block text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-500 font-semibold">Read More →</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</body>

</html>
