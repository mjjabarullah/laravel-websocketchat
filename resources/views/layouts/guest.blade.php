<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body >
        <div class="font-sans text-gray-900 antialiased">
            <div class="flex pb-20 w-full bg-gradient-to-b from-blue-600 via-blue-400 to-blue-100">
                <div class="flex flex-1 items-center justify-center">
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="text-center text-4xl font-bold text-white">Meet New People</h1>
                        <p class="pr-10 pl-10 pt-5 text-center text-lg font-medium text-white">
                            Our chat community gives you the opportunity of making
                            new friends and sharing good moments with other people.
                        </p>
                        <div class="w-80">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
                <div class="flex hidden md:block  flex-1 justify-center items-center">
                    <img class="w-auto h-auto" src="{{asset('storage/assets/img/banner.webp')}}" alt=""/>
                </div>
            </div>
        </div>

    </body>
</html>
