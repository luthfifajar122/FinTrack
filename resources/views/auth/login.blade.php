<x-guest-layout>
    <h1 class="text-xl font-bold uppercase tracking-tight mb-0.5">Masuk</h1>
    <p class="text-xs font-bold uppercase tracking-widest opacity-60 mb-4">Selamat datang kembali di FinTrack</p>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="w-5 h-5 rounded-md border-2 border-ink text-mint-dark focus:ring-mint" name="remember">
                <span class="ms-2 text-sm font-bold">Ingat saya</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4 gap-2">
            @if (Route::has('password.request'))
                <a class="font-bold text-sm underline decoration-ink decoration-2 underline-offset-2 hover:bg-mint px-1 rounded" href="{{ route('password.request') }}">
                    Lupa kata sandi?
                </a>
            @endif

            <x-primary-button class="!px-4 !py-2 !text-xs">
                Masuk
            </x-primary-button>
        </div>

        <p class="text-center text-sm font-medium mt-2 pt-3 border-t-2 border-ink/10">
            Belum punya akun?
            <a class="font-bold underline decoration-ink decoration-2 underline-offset-2 hover:bg-mint px-1 rounded" href="{{ route('register') }}">
                Daftar
            </a>
        </p>
    </form>
</x-guest-layout>
