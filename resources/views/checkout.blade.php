@extends('layouts.app')

@section('title', 'Register – Mega Graphology Webinar')
@section('description', 'Reserve your seat for the Mega Graphology Webinar by All India Institute of Occult Science.')

@push('styles')
{{-- Preconnect to Zoho so the iframe DNS + TLS is resolved before it renders --}}
<link rel="preconnect" href="https://forms.zohopublic.in" crossorigin>
<link rel="dns-prefetch" href="https://forms.zohopublic.in">
@endpush

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

    <div class="max-w-6xl mx-auto px-4 md:px-8 py-10 md:py-14">

        {{-- Mobile: info shown above form --}}
        <div class="lg:hidden flex flex-col gap-4 mb-6">
            <div>
                <h1 class="text-lg font-bold text-gray-900 mb-1">Mega Graphology Webinar</h1>
                <p class="text-xs text-gray-500">Sun, 3rd May 2026 &nbsp;·&nbsp; 1:00 PM – 3:00 PM IST</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-start">

            {{-- LEFT: desktop info --}}
            <div class="hidden lg:flex flex-col gap-7">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-1">Mega Graphology Webinar</h1>
                    <p class="text-sm text-gray-500">Sun, 3rd May 2026 &nbsp;·&nbsp; 1:00 PM – 3:00 PM IST</p>
                </div>
            </div>

            {{-- RIGHT: form --}}
            <div>
                <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
                    <iframe
                        id="zoho-form-iframe"
                        src="https://forms.zohopublic.in/allindiainstituteofoccultsci1/form/MegaWebnar/formperma/G5-sJzQY1LJXGwjhhOK6RpOrPD680Uc6NMOQhg1Yv88"
                        frameborder="0"
                        scrolling="no"
                        style="height:850px;width:100%;border:none;display:block;overflow:hidden;"
                        class="md:!h-[1100px]"
                        title="Webinar Registration Form"
                    ></iframe>
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
            if (e.data.action === 'setHeight' && e.data.height)
                iframe.style.height = (parseInt(e.data.height, 10) + 40) + 'px';
            if (e.data.type === 'zoho_form_submitted' || e.data.action === 'zf_submitted' ||
                e.data.action === 'submitComplete' || e.data.zf_event === 'formSubmit')
                doRedirect();
        }
        if (typeof e.data === 'string') {
            var p = e.data.split('|');
            if (p[0] === 'zf-iframeResize' && p[2])
                iframe.style.height = (parseInt(p[2], 10) + 40) + 'px';
            if (!isNaN(parseInt(e.data, 10)) && p.length === 1)
                iframe.style.height = (parseInt(e.data, 10) + 40) + 'px';
            if (e.data.indexOf('zf_submitted') !== -1 || e.data.indexOf('submitComplete') !== -1)
                doRedirect();
        }
    }, false);

    // Fallback poll — same-origin detection after Zoho redirects the iframe
    var poll = setInterval(function () {
        try {
            var href = iframe.contentWindow.location.href;
            if (href && href.indexOf('zohopublic') === -1) { clearInterval(poll); doRedirect(); }
        } catch (e) {}
    }, 2000);
    setTimeout(function () { clearInterval(poll); }, 20 * 60 * 1000);
});
</script>
@endpush
