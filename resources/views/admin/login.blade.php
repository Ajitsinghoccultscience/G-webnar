@extends('layouts.admin')
@section('title', 'Login')

@section('content')
<div class="min-h-screen bg-[#f5f6fa] flex items-center justify-center px-4">

    <div class="w-full max-w-sm">

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

            {{-- Header strip --}}
            <div class="bg-neutral-a px-8 py-7 flex flex-col items-center gap-3 text-center">
                <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo"
                     class="w-14 h-14 rounded-2xl object-contain ring-2 ring-white/20">
                <div>
                    <h1 class="text-white font-bold text-lg tracking-tight">Admin Login</h1>
                    <p class="text-white/50 text-xs mt-0.5">All India Institute of Occult Science</p>
                </div>
            </div>

            {{-- Form --}}
            <div class="px-8 py-7">

                @if($errors->any())
                    <div class="mb-5 flex items-start gap-2.5 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl px-4 py-3">
                        <svg class="w-4 h-4 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}" class="flex flex-col gap-4">
                    @csrf

                    <div class="flex flex-col gap-1.5">
                        <label for="email" class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Email</label>
                        <input id="email" type="email" name="email"
                            value="{{ old('email') }}"
                            required autofocus autocomplete="email"
                            placeholder="admin@example.com"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-neutral-a placeholder-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-neutral-a/20 focus:border-neutral-a transition-all">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label for="password" class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Password</label>
                        <input id="password" type="password" name="password"
                            required autocomplete="current-password"
                            placeholder="••••••••"
                            class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-neutral-a placeholder-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-neutral-a/20 focus:border-neutral-a transition-all">
                    </div>

                    <button type="submit"
                        class="mt-1 w-full bg-neutral-a hover:bg-neutral-c active:scale-[0.98] text-white font-bold py-3 rounded-xl text-sm transition-all">
                        Sign In
                    </button>

                </form>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-5">Graphology Webinar &mdash; Admin Portal</p>

    </div>
</div>
@endsection
