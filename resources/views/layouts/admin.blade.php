<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') – Graphology Webinar</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#f5f6fa] text-neutral-a antialiased">

@hasSection('sidebar')

<div class="flex min-h-screen">

    {{-- ── LEFT SIDEBAR ── --}}
    <aside class="w-60 shrink-0 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-40">

        {{-- Brand --}}
        <div class="flex items-center gap-3 px-5 py-5 border-b border-gray-100">
            <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo"
                 class="w-9 h-9 rounded-xl object-contain ring-1 ring-gray-200">
            <div class="min-w-0">
                <p class="font-bold text-sm text-neutral-a leading-tight truncate">Occult Science</p>
                <p class="text-[11px] text-gray-400 leading-tight">Admin Panel</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-4 flex flex-col gap-4 overflow-y-auto">

            {{-- Module: Webinar --}}
            <div>
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest px-3 mb-1.5">Webinar</p>
                <div class="flex flex-col gap-0.5">
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-colors
                              {{ request()->routeIs('admin.dashboard') ? 'bg-neutral-a text-white' : 'text-gray-600 hover:bg-gray-100 hover:text-neutral-a' }}">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        Webinar Settings
                    </a>
                </div>
            </div>

        </nav>

        {{-- User + Logout --}}
        <div class="border-t border-gray-100 px-3 py-4">
            <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-gray-50 mb-2">
                <div class="w-7 h-7 rounded-full bg-neutral-a flex items-center justify-center shrink-0">
                    <span class="text-white text-xs font-bold">{{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}</span>
                </div>
                <div class="min-w-0">
                    <p class="text-xs font-semibold text-neutral-a truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-[11px] text-gray-400 truncate">{{ Auth::user()->email ?? '' }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm text-red-500 hover:bg-red-50 font-medium transition-colors">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- ── MAIN CONTENT ── --}}
    <div class="flex-1 ml-60 flex flex-col min-h-screen">

        {{-- Top bar --}}
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between sticky top-0 z-30">
            <div>
                <h1 class="font-bold text-base text-neutral-a">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-gray-400 mt-0.5">@yield('page-subtitle', 'Manage your webinar settings')</p>
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-400">
                <span class="w-2 h-2 rounded-full bg-green-400 inline-block"></span>
                Live
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 px-8 py-8">
            @yield('content')
        </main>

    </div>

</div>

@else
    {{-- Login page — no sidebar --}}
    @yield('content')
@endif

</body>
</html>
