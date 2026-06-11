@extends('layouts.admin')
@section('title', 'Dashboard')
@section('sidebar')@endsection
@section('page-title', 'Webinar Settings')
@section('page-subtitle', 'Update date and WhatsApp link across the entire website')

@section('content')

<div class="max-w-2xl flex flex-col gap-5">

    {{-- Success --}}
    @if(session('success'))
        <div class="flex items-center gap-3 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl px-4 py-3">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Errors --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl px-4 py-3 flex flex-col gap-1">
            @foreach($errors->all() as $error)
                <p class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                    </svg>
                    {{ $error }}
                </p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.update') }}" class="flex flex-col gap-5">
        @csrf
        @method('PATCH')

        {{-- Webinar Date card --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm text-neutral-a">Webinar Date</p>
                    <p class="text-xs text-gray-400">Updates hero section &amp; checkout page</p>
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Date text</label>
                <input type="text" name="webinar_date"
                    value="{{ old('webinar_date', $webinarDate) }}"
                    placeholder="e.g. Wed, 24 June, 2026"
                    required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-neutral-a placeholder-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-neutral-a/15 focus:border-neutral-a transition-all">
            </div>
        </div>

        {{-- WhatsApp Link card --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-10 h-10 rounded-xl bg-green-50 border border-green-100 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-[#25D366]" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-sm text-neutral-a">WhatsApp Community Link</p>
                    <p class="text-xs text-gray-400">Updates the join button on the thank you page</p>
                </div>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Community invite URL</label>
                <input type="url" name="whatsapp_link"
                    value="{{ old('whatsapp_link', $whatsappLink) }}"
                    placeholder="https://chat.whatsapp.com/..."
                    required
                    class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-neutral-a placeholder-gray-300 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-neutral-a/15 focus:border-neutral-a transition-all">
            </div>
        </div>

        {{-- Live preview --}}
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5 flex flex-col gap-3">
            <p class="text-xs font-semibold text-amber-700 uppercase tracking-wide">Live Preview</p>
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div class="bg-white rounded-xl p-3 border border-amber-100">
                    <p class="text-[11px] text-gray-400 uppercase font-semibold tracking-wide mb-1">Date</p>
                    <p class="font-bold text-neutral-a text-xs" id="preview-date">{{ $webinarDate }}</p>
                </div>
                <div class="bg-white rounded-xl p-3 border border-amber-100">
                    <p class="text-[11px] text-gray-400 uppercase font-semibold tracking-wide mb-1">WhatsApp</p>
                    <p class="font-bold text-[#25D366] text-xs truncate" id="preview-wa">{{ $whatsappLink ? 'Link set' : 'Not set' }}</p>
                </div>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-neutral-a hover:bg-neutral-c active:scale-[0.99] text-white font-bold py-3.5 rounded-xl text-sm transition-all shadow-sm">
            Save Changes
        </button>

    </form>
</div>

<script>
    document.querySelector('[name=webinar_date]').addEventListener('input', function () {
        document.getElementById('preview-date').textContent = this.value || '–';
    });
    document.querySelector('[name=whatsapp_link]').addEventListener('input', function () {
        document.getElementById('preview-wa').textContent = this.value ? 'Link set' : 'Not set';
    });
</script>

@endsection
