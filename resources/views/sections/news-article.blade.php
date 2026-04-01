@props([
    'title' => 'News & Articles',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'images' => [
        'images/graphology image/news article.webp',
        'images/graphology image/news article.webp',
        'images/graphology image/news article.webp',
    ],
])

@php
    $images = $images ?? [
        'images/graphology image/news article.webp',
        'images/graphology image/news article.webp',
        'images/graphology image/news article.webp',
    ];
@endphp

<!-- <section class="w-full section-spacing bg-neutral-bg "> -->
<section class="w-full section-spacing bg-white ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        <x-ui.carousel variant="single" gridAt="xl" gridCols="3" class="gap-4 md:gap-6 lg:gap-8">
            @foreach($images as $image)
                <x-ui.carousel-slide variant="single" gridAt="xl" class="min-w-0">
                    <div class="aspect-[479/338] rounded-[10px] overflow-hidden shadow-drop bg-white w-full">
                        <img src="{{ asset($image) }}" alt="" class="w-full h-full object-contain">
                    </div>
                </x-ui.carousel-slide>
            @endforeach
        </x-ui.carousel>
    </div>
</section>
