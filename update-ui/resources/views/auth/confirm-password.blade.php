<x-guest-layout>
    <h1 class="text-2xl font-bold uppercase tracking-tight mb-1">🛡️ Konfirmasi</h1>
    <div class="mb-4 text-sm font-medium bg-mint-pale border-2 border-ink rounded-lg px-3 py-2 shadow-brutal-sm">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-5">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
