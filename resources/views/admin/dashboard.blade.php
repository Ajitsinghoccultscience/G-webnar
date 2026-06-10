<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard – Graphology Webinar</title>
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-neutral-b text-white">

{{-- Navbar --}}
<header class="border-b border-white/10 px-6 py-4 flex items-center justify-between">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/assets%20desktop/favicon.png') }}" alt="Logo" class="w-9 h-9 rounded-full object-contain">
        <span class="font-bold text-sm tracking-wide">Admin Dashboard</span>
    </div>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-white/60 hover:text-white transition-colors">Logout</button>
    </form>
</header>

<main class="max-w-xl mx-auto px-6 py-12">

    <h2 class="text-2xl font-bold mb-2">Webinar Settings</h2>
    <p class="text-white/50 text-sm mb-8">Update the date and WhatsApp community link shown across the website.</p>

    @if(session('success'))
        <div class="mb-6 bg-green-500/20 border border-green-500/40 text-green-300 text-sm rounded-xl px-4 py-3">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 bg-red-500/20 border border-red-500/40 text-red-300 text-sm rounded-xl px-4 py-3">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.update') }}" class="flex flex-col gap-6">
        @csrf
        @method('PATCH')

        {{-- Webinar Date --}}
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-accent-gold shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3 class="font-semibold text-base">Webinar Date</h3>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-white/60 text-xs uppercase tracking-wide font-semibold">Date text (shown on website)</label>
                <input type="text" name="webinar_date" value="{{ old('webinar_date', $webinarDate) }}" required
                    placeholder="e.g. Wed, 17 June, 2026"
                    class="bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent-gold transition-colors">
                <p class="text-white/30 text-xs">This updates the date shown in the hero section and checkout page.</p>
            </div>
        </div>

        {{-- WhatsApp Link --}}
        <div class="bg-white/5 border border-white/10 rounded-2xl p-6 flex flex-col gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-[#25D366] shrink-0" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                <h3 class="font-semibold text-base">WhatsApp Community Link</h3>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-white/60 text-xs uppercase tracking-wide font-semibold">Community invite URL</label>
                <input type="url" name="whatsapp_link" value="{{ old('whatsapp_link', $whatsappLink) }}" required
                    placeholder="https://chat.whatsapp.com/..."
                    class="bg-white/10 border border-white/20 text-white placeholder-white/30 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-accent-gold transition-colors">
                <p class="text-white/30 text-xs">This updates the join button on the thank you page.</p>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-accent-gold hover:bg-accent-gold/90 text-neutral-b font-bold py-4 rounded-xl text-base transition-colors">
            Save Changes
        </button>
    </form>

</main>

</body>
</html>
