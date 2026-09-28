<x-guest-layout>
    <h1 class="text-2xl font-bold uppercase tracking-tight mb-1">Verifikasi Email</h1>
    <div class="mb-4 text-sm font-medium bg-mint-pale border-2 border-ink rounded-lg px-3 py-2 shadow-brutal-sm">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-bold bg-mint border-2 border-ink rounded-lg px-3 py-2 shadow-brutal-sm">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between gap-2">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="font-bold text-sm hover:bg-[#FF6B6B] hover:text-white px-1 rounded">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
