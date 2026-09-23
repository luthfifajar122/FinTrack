@extends('layouts.fintrack')
@section('title', 'Profil')
@section('content')
<div class="mb-5">
    <h1 class="text-2xl md:text-3xl font-bold tracking-tight">Profil</h1>
    <p class="text-sm text-slate-500 mt-1">Kelola informasi akun dan keamanan Anda</p>
</div>
<div class="space-y-5 max-w-3xl">
    <div class="bg-white p-5 md:p-6 rounded-2xl shadow-sm">
        @include('profile.partials.update-profile-information-form')
    </div>
    <div class="bg-white p-5 md:p-6 rounded-2xl shadow-sm">
        @include('profile.partials.update-password-form')
    </div>
    <div class="bg-white p-5 md:p-6 rounded-2xl shadow-sm border border-red-100">
        @include('profile.partials.delete-user-form')
    </div>
</div>
@endsection
