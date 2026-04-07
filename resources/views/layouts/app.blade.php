<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('images/assets%20desktop/favicon.png') }}">

    {{-- GTM: only initialise dataLayer here — script loads after window load --}}
    <script>window.dataLayer = window.dataLayer || [];</script>

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('description', 'Webnar - Your platform for webinars and live events.')">

    {{-- Preload LCP hero image --}}
    <link rel="preload" as="image" href="{{ asset('images/assets%20desktop/convo%20graphology1.webp') }}" fetchpriority="high">

    {{-- Non-blocking Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style"
          href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap"
          onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700&display=swap">
    </noscript>

    {{-- CSS only from Vite manifest — JS bundle intentionally skipped --}}
    @php
        $cssFile = null;
        $manifestPath = public_path('build/manifest.json');
        if (file_exists($manifestPath)) {
            $manifest = json_decode(file_get_contents($manifestPath), true);
            $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
        }
    @endphp
    @if($cssFile)
        <link rel="stylesheet" href="{{ asset('build/' . $cssFile) }}">
    @elseif(file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @else
        <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    @endif

    @stack('styles')
</head>
<body>
    {{-- GTM noscript fallback --}}
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKZ3QZQJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    @yield('content')

    @stack('scripts')

    {{-- GTM: load full script after window load so it never blocks rendering --}}
    <script>
    window.addEventListener('load', function () {
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KKZ3QZQJ');
    });
    </script>
</body>
</html>
