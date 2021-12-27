<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html" xmlns:livwire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>{{env('APP_NAME', 'Laravel Websocket Chat')}}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="antialiased h-screen font-poppins">
        <div x-data={showMenu:false} class="h-screen flex flex-col justify-between overflow-hidden">
            {{--        header section--}}
            <livewire:header />
            {{--        chat section--}}
            <livewire:chat />
            {{--        footer section--}}
            <livewire:footer />
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts

        <audio class="hidden" id="private_sound" src="https://mytamilchat.com/chat//sounds/private.mp3"></audio>
        <audio class="hidden" id="message-sound" src="https://mytamilchat.com/chat//sounds/new_messages.mp3"></audio>
        <audio class="hidden" id="username_sound" src="https://mytamilchat.com/chat//sounds/username.mp3"></audio>
        <audio class="hidden" id="whistle_sound" src="https://mytamilchat.com/chat//sounds/whistle.mp3"></audio>
        <audio class="hidden" id="notify_sound" src="https://mytamilchat.com/chat//sounds/notify.mp3"></audio>
        <audio class="hidden" id="news_sound" src="https://mytamilchat.com/chat//sounds/new_news.mp3"></audio>
    </body>
</html>


