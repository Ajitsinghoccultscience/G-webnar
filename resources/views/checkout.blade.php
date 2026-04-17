@extends('layouts.app')

@section('title', 'Register – Mega Graphology Webinar')
@section('description', 'Reserve your seat for the Mega Graphology Webinar by All India Institute of Occult Science.')

@section('content')

<div class="min-h-screen bg-gray-50">

    {{-- Header --}}
    <header class="w-full bg-white border-b border-gray-200 py-3 px-5 flex items-center justify-between">
        <div class="flex items-center gap-2.5">
            <img src="{{ asset('images/assets%20desktop/favicon.png') }}"
                 alt="All India Institute of Occult Science"
                 class="h-9 w-9 object-contain rounded-full">
            <span class="text-sm font-semibold text-gray-800 hidden sm:block">All India Institute of Occult Science</span>
        </div>
        <div class="flex items-center gap-2 text-sm font-semibold text-gray-700">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm.5 5v5.25l4.5 2.67-.75 1.23L11 13V7h1.5z"/>
            </svg>
            Only a Few Seats Left
        </div>
    </header>

    {{-- Two-column layout --}}
    <div class="max-w-6xl mx-auto px-4 md:px-8 py-10 md:py-14">
        {{-- Trainer + Alumni — mobile only, shown ABOVE the form --}}
        <div class="lg:hidden flex flex-col gap-4 mb-6">
            <div>
                <h1 class="text-lg font-bold text-gray-900 mb-1">Mega Graphology Webinar</h1>
                <p class="text-xs text-gray-500">Sun, 19th April 2026 &nbsp;·&nbsp; 02:00 PM – 05:00 PM IST</p>
            </div>
            <div class="border-t border-gray-200"></div>
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full shrink-0 overflow-hidden border border-gray-200 bg-gray-100">
                    <img src="{{ asset('images/assets%20desktop/pawan%20kumar.png') }}"
                         alt="Pawan Kumar"
                         class="w-full h-full object-cover" style="object-position: 50% 0%;">
                </div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                    <h3 class="text-sm font-bold text-gray-900">Pawan Kumar</h3>
                    <p class="text-xs text-gray-500">Graphologist · All India Institute of Occult Science</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2">
                    <img src="{{ asset('images/assets%20desktop/Aryan_Mehta.avif') }}"  class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                    <img src="{{ asset('images/assets%20desktop/Priya_Sharma.avif') }}" class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                    <img src="{{ asset('images/assets%20desktop/Rishika.avif') }}"      class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                    <img src="{{ asset('images/assets%20desktop/Vikram_Singh.avif') }}" class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                </div>
                <p class="text-sm text-gray-500">
                    <span class="font-bold text-gray-800">18,000+ alumni</span> have trained with us
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- ===== LEFT COLUMN ===== --}}
            <div class="flex flex-col gap-4 lg:gap-7">

                {{-- Webinar title + date/time (desktop only — mobile shows above) --}}
                <div class="hidden lg:block">
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Mega Graphology Webinar</h1>
                    <p class="text-sm text-gray-500">Sun, 19th April 2026 &nbsp;·&nbsp; 02:00 PM – 05:00 PM IST</p>
                </div>

                {{-- Divider (desktop only) --}}
                <div class="hidden lg:block border-t border-gray-200"></div>

                {{-- Trainer (desktop only) --}}
                <div class="hidden lg:flex items-center gap-4">
                    <div class="w-16 h-16 rounded-full shrink-0 overflow-hidden border border-gray-200 bg-gray-100">
                        <img src="{{ asset('images/assets%20desktop/pawan%20kumar.png') }}"
                             alt="Pawan Kumar"
                             class="w-full h-full object-cover" style="object-position: 50% 0%;">
                    </div>
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-0.5">Your Trainer</p>
                        <h3 class="text-sm font-bold text-gray-900">Pawan Kumar</h3>
                        <p class="text-xs text-gray-500">Graphologist · All India Institute of Occult Science</p>
                        <p class="text-xs text-gray-400 mt-1">BSc Mathematics + Master's in Psychology — Handwriting analysis &amp; signature expert.</p>
                    </div>
                </div>

                {{-- Social proof (desktop only) --}}
                <div class="hidden lg:flex items-center gap-3">
                    <div class="flex -space-x-2">
                        <img src="{{ asset('images/assets%20desktop/Aryan_Mehta.avif') }}"  class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                        <img src="{{ asset('images/assets%20desktop/Priya_Sharma.avif') }}" class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                        <img src="{{ asset('images/assets%20desktop/Rishika.avif') }}"      class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                        <img src="{{ asset('images/assets%20desktop/Vikram_Singh.avif') }}" class="w-8 h-8 rounded-full border-2 border-white object-cover" alt="">
                    </div>
                    <p class="text-sm text-gray-500">
                        <span class="font-bold text-gray-800">18,000+ alumni</span> have trained with us
                    </p>
                </div>

            </div>

            {{-- ===== RIGHT COLUMN — FORM ===== --}}
            <div>
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                    {{-- Offer timer header --}}
                    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-center gap-2">
                        <span class="text-sm font-semibold text-gray-600">⚡ Offer closes in</span>
                        <div class="flex items-center gap-1">
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-hours" class="text-gray-900 font-bold text-sm tabular-nums">04</span>
                            </div>
                            <span class="text-gray-400 font-bold text-sm">:</span>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-mins" class="text-gray-900 font-bold text-sm tabular-nums">00</span>
                            </div>
                            <span class="text-gray-400 font-bold text-sm">:</span>
                            <div class="bg-gray-100 border border-gray-300 rounded px-2 py-1 min-w-[32px] text-center">
                                <span id="co-secs" class="text-gray-900 font-bold text-sm tabular-nums">00</span>
                            </div>
                        </div>
                    </div>

                    {{-- Iframe — tall enough to show full form, auto-grows via postMessage --}}
                    <iframe
                        id="zoho-form-iframe"
                        src="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaWebnar/formperma/G5-sJzQY1LJXGwjhhOK6RpOrPD680Uc6NMOQhg1Yv88"
                        frameborder="0"
                        scrolling="no"
                        allow="geolocation; microphone; camera; payment"
                        style="height:1200px; width:100%; border:none; display:block; overflow:hidden;"
                        title="Webinar Registration Form"
                        loading="eager"
                    ></iframe>

                    {{-- Trust badge --}}
                    <div class="px-6 py-3 border-t border-gray-100 flex items-center justify-center gap-1.5 text-xs text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:14px;height:14px;flex-shrink:0;display:inline-block;">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <span>100% Secure · Powered by Zoho</span>
                    </div>
                </div>
            </div>

        </div>


    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Countdown timer — synced with sticky bar (same localStorage key) ──
    (function () {
        var TOTAL = 14400; // seconds — matches sticky bar
        var KEY   = 'sb_timer_end_14400';
        var elH   = document.getElementById('co-hours');
        var elM   = document.getElementById('co-mins');
        var elS   = document.getElementById('co-secs');
        if (!elH || !elM || !elS) return;
        function pad(n) { return String(n).padStart(2, '0'); }
        function getEnd() {
            var stored = localStorage.getItem(KEY);
            var now = Math.floor(Date.now() / 1000);
            if (stored) {
                var val = parseInt(stored);
                if (val > now && val <= now + TOTAL) return val;
            }
            var e = now + TOTAL;
            localStorage.setItem(KEY, e);
            return e;
        }
        var end = getEnd();
        function tick() {
            var now = Math.floor(Date.now() / 1000);
            var r = end - now;
            if (r <= 0) { end = now + TOTAL; localStorage.setItem(KEY, end); r = TOTAL; }
            elH.textContent = pad(Math.floor(r / 3600));
            elM.textContent = pad(Math.floor((r % 3600) / 60));
            elS.textContent = pad(r % 60);
        }
        tick();
        setInterval(tick, 1000);
    })();

    // ── Zoho iframe — auto-resize + redirect on submit ─────────────────────
    (function () {
        var iframe = document.getElementById('zoho-form-iframe');
        var THANK_YOU_URL = '{{ url("/thankyou") }}';
        var redirected = false;
        if (!iframe) return;

        function doRedirect() {
            if (redirected) return;
            redirected = true;
            window.location.href = THANK_YOU_URL;
        }

        window.addEventListener('message', function (e) {
            if (!e.data) return;
            if (typeof e.data === 'object') {
                var d = e.data;
                if (d.action === 'setHeight' && d.height) {
                    iframe.style.height = (parseInt(d.height, 10) + 40) + 'px';
                }
                if (d.type === 'zoho_form_submitted' || d.action === 'zf_submitted' ||
                    d.action === 'submitComplete' || d.zf_event === 'formSubmit') {
                    doRedirect();
                }
            }
            if (typeof e.data === 'string') {
                var parts = e.data.split('|');
                if (parts[0] === 'zf-iframeResize' && parts[2]) {
                    iframe.style.height = (parseInt(parts[2], 10) + 40) + 'px';
                }
                if (!isNaN(parseInt(e.data, 10)) && parts.length === 1) {
                    iframe.style.height = (parseInt(e.data, 10) + 40) + 'px';
                }
                if (e.data.indexOf('zf_submitted') !== -1 || e.data.indexOf('submitComplete') !== -1 ||
                    e.data.indexOf('formSubmit') !== -1) {
                    doRedirect();
                }
            }
        }, false);

        var poll = setInterval(function () {
            try {
                var href = iframe.contentWindow.location.href;
                if (!href || href === 'about:blank') return;
                if (href.indexOf('zohopublic') === -1 || href.indexOf('thankyou') !== -1 ||
                    href.indexOf('thank-you') !== -1 || href.indexOf('success') !== -1) {
                    clearInterval(poll);
                    doRedirect();
                }
            } catch (e) {}
        }, 800);

        setTimeout(function () { clearInterval(poll); }, 30 * 60 * 1000);
    })();

});
</script>
@endpush
