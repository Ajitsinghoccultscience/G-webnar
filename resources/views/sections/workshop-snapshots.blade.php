@props([
    'title' => "Last workshop's snapshots",
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'images' => [
        'images/graphology image/zoom desktop (2).webp',
        'images/graphology image/zoom desktop (2).webp',
        'images/graphology image/zoom desktop (2).webp',
    ],
])

@php
    $images = $images ?? [
        'images/graphology image/zoom desktop (2).webp',
        'images/graphology image/zoom desktop (2).webp',
        'images/graphology image/zoom desktop (2).webp',
    ];
    $largeImage = $images[0] ?? 'images/graphology image/zoom desktop (2).webp';
    $mediumImage = $images[1] ?? $images[0] ?? 'images/graphology image/zoom desktop (2).webp';
    $smallImage = $images[2] ?? $images[0] ?? 'images/graphology image/zoom desktop (2).webp';
@endphp

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-6 md:mb-8">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 items-start">
            {{-- Left: Single large image (hidden on mobile, show only 3 images) --}}
            <div class="hidden lg:block rounded-xl overflow-hidden aspect-[4/3] lg:aspect-auto lg:min-h-[26.25rem] lg:h-[26.25rem] shadow-drop">
                <img src="{{ asset($largeImage) }}" alt="Workshop snapshot" class="w-full h-full object-cover">
            </div>

            {{-- Right: Medium + 2 small images --}}
            <div class="grid grid-rows-2 gap-3">
                <div class="rounded-xl overflow-hidden aspect-video shadow-drop">
                    <img src="{{ asset($mediumImage) }}" alt="Workshop snapshot" class="w-full h-full object-cover">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="rounded-xl overflow-hidden aspect-video shadow-drop">
                        <img src="{{ asset($smallImage) }}" alt="Workshop snapshot" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-xl overflow-hidden aspect-video shadow-drop">
                        <img src="{{ asset($smallImage) }}" alt="Workshop snapshot" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
