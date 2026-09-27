<section class="space-y-5">
    <header class="pb-3 border-b-2 border-ink">
        <h2 class="text-lg font-bold uppercase tracking-tight text-ink">
            ⚠️ Hapus Akun
        </h2>

        <p class="mt-1 text-sm font-medium opacity-70">
            Setelah akun dihapus, seluruh data Anda akan dihapus permanen. Unduh dulu data yang ingin disimpan sebelum melanjutkan.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >Hapus Akun</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold uppercase text-ink">
                Yakin hapus akun?
            </h2>

            <p class="mt-1 text-sm font-medium opacity-70">
                Setelah dihapus, seluruh data tidak bisa dikembalikan. Masukkan kata sandi untuk konfirmasi.
            </p>

            <div class="mt-5">
                <x-input-label for="password" value="Kata Sandi" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Kata sandi"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-5 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Batal
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    Hapus Akun
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
