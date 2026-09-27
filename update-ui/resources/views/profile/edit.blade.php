@extends('layouts.fintrack')
@section('title', 'Profil')
@section('content')
<div class="mb-5">
    <h1 class="page-title-brutal">Profil</h1>
    <p class="text-xs font-bold uppercase tracking-widest text-ink/60 mt-2">Kelola informasi akun & keamanan Anda</p>
</div>
<div class="space-y-5 max-w-3xl">
    <div class="card-brutal p-5 md:p-6">
        @include('profile.partials.update-profile-information-form')
    </div>
    <div class="card-brutal p-5 md:p-6 bg-mint-pale/40">
        @include('profile.partials.update-password-form')
    </div>
    <div class="card-brutal p-5 md:p-6 bg-[#FECACA]/40">
        @include('profile.partials.delete-user-form')
    </div>
</div>
@endsection
