<x-layout :title="$title">
    <section class="min-h-screen flex items-center justify-center bg-gray-100">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="bg-white p-6 rounded shadow-md w-full max-w-md">
            @csrf
            <h1 class="text-2xl font-bold mb-4">{{ __('Lupa Kata Sandi') }}</h1>
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Lupa kata sandi? Tidak masalah. Cukup kasih tau alamat email kamu, nanti kami kirimkan link lewat email buat reset kata sandi, jadi kamu bisa bikin kata sandi yang baru.') }}
            </div>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Kirim Link Reset Kata Sandi') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-layout>
