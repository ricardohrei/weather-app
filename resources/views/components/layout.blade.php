<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Open Weather</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <livewire:styles/>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Alpine js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body>
<section class="relative">
    <nav class="block lg:flex justify-between border-b">
        <div class="px-12 py-8 flex w-full items-center">
            <a class=" xl:block lg:mr-16 mx-auto lg:mx-0" href="/">
                <div class="flex items-center ">
                    <svg width="55" height="55" xmlns="http://www.w3.org/2000/svg" class="h-55 text-indigo-500"
                         viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                              clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <span class="text-xl text-black font-bold text-center">OpenWeather</span>
                        <span class="block text-xs text-gray-500 text-center">Your Weather Partner</span>
                    </div>
                </div>
            </a>
        </div>
        <div
            class="flex justify-center lg:justify-between items-center mx-auto px-12 border-l text-center font-semibold font-heading p-8 lg:pb-0 lg:pt-0">
            <svg class="mr-3 hidden lg:block" width="32" height="31" viewBox="0 0 32 31" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16.0006 16.3154C19.1303 16.3154 21.6673 13.799 21.6673 10.6948C21.6673 7.59064 19.1303 5.07422 16.0006 5.07422C12.871 5.07422 10.334 7.59064 10.334 10.6948C10.334 13.799 12.871 16.3154 16.0006 16.3154Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path
                    d="M24.4225 23.8963C23.6678 22.3507 22.4756 21.0445 20.9845 20.1298C19.4934 19.2151 17.7647 18.7295 15.9998 18.7295C14.2349 18.7295 12.5063 19.2151 11.0152 20.1298C9.52406 21.0445 8.33179 22.3507 7.57715 23.8963"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            @guest
                <a href="/register" class="hover:text-gray-600 inline-flex inline">Register</a>
                <a href="/login" class="ml-6 hover:text-gray-600 inline-flex inline">Login</a>
            @else
                @if(auth()->user()->isAdmin())
                    <a href="/admin" class="ml-6 hover:text-gray-600 inline-flex inline">Backend</a>
                @endif
                <form method="POST" action="logout">
                    @csrf
                    <button type="submit" class="ml-6 hover:text-gray-600 inline-flex inline">Logout</button>
                </form>
            @endguest
        </div>
    </nav>
</section>

<div class="bg-blue-200 min-h-screen">
    {{ $slot }}
</div>

<livewire:scripts/>
</body>
</html>
