<x-layout :title="$title">
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <!-- Session Status -->

        <form method="POST" action="{{ route('login') }}" class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <x-auth-session-status class="my-4" :status="session('status')" />
            @csrf
            <h1 class="text-2xl font-bold text-center mb-6">Login</h1>

            <!-- Email Address or Username (USer credentials) -->
            <div>
                <x-input-label for="user_cred" :value="__('Email atau Username')" />
                <x-text-input id="user_cred" class="block mt-1 w-full" type="text" name="user_cred" :value="old('user_cred')"
                    required autofocus autocomplete="user_cred" />
                <x-input-error :messages="$errors->get('user_cred')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded-sm border-gray-300 text-indigo-600 shadow-xs focus:ring-indigo-500"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('lupa password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-layout>
