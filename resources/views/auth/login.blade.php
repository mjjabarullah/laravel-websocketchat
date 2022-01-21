<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-application-logo class="w-24 h-24 fill-current"/>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>

        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"/>

                <x-input id="email" class="block mt-1 w-full" placeholder="Enter email" type="email" name="email" :value="old('email')" required autofocus/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"/>

                <x-input id="password" class="block mt-1 w-full" placeholder="Enter password" type="password" name="password"  required autocomplete="current-password"/>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded text-pink-600 shadow-lg border-gray-300 focus:border-pink-300  focus:ring-pink-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

            </div>
            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-3" >
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <div class="flex items-center space-x-2 justify-center mt-4">
            <a  class="inline-flex text-center bg-red-600 font-semibold text-white px-4 py-1 rounded-full hover:bg-red-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 ">
                {{ __('Register') }}
            </a>
            <a  class="inline-flex items-center px-4 py-1 bg-green-600 font-semibold text-white rounded-full hover:bg-green-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300" >
                {{ __('Guest') }}
            </a>
        </div>
    </x-auth-card>

</x-guest-layout>
