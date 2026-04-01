@props([
    'title' => 'For a normal person it’s just Handwriting , but for a graphologist it’s a blueprint of personality',
    'bullets' => [
        'Lorem ipsum dolor sit amet consectetur',
        'Lorem ipsum dolor sit amet consectetur',
        'Lorem ipsum dolor sit amet consectetur',
        'Lorem ipsum dolor sit amet consectetur',
        'Lorem ipsum dolor sit amet consectetur',
        'Lorem ipsum dolor sit amet consectetur',
    ],
    'ctaText' => 'Start Your Journey @99',
    'ctaHref' => '#',
    'image' => null,
])



@php
    $featherIcon = 'images/Graphology (logo)/untitled folder 3/feather 1.svg';
@endphp

{{-- Card with image left (Figma 283:464) - 1496x496px, radius 20px, bg-neutral-b --}}
<section class="w-full section-spacing ">
    <div class="max-w-[1496px] mx-auto section-px">
        <x-ui.card variant="dark" :padding="false" class="overflow-hidden w-full h-auto lg:h-[496px] rounded-xl relative">
            <div class="grid grid-cols-1 lg:grid-cols-[549px_1fr] h-full lg:h-[496px] gap-0">
                {{-- Image - Mobile: first. Desktop: left col --}}
                <div class="order-1 lg:order-1 flex items-center justify-center p-4 lg:p-6 lg:pl-6">
                    <div class="w-full max-w-[549px] aspect-[549/364] rounded-md overflow-hidden bg-neutral-e flex items-center justify-center shrink-0">
                        @if($image)
                            <img src="{{ $image }}" alt="" class="w-full h-full object-cover">
                        @else
                            <div class="flex flex-col items-center justify-center gap-2 text-neutral-h p-8">
                                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                </svg>
                                <span class="text-content font-medium">Image placeholder</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Content - Mobile: title then bullets. Desktop: right col --}}
                <div class="order-2 lg:order-2 relative p-4 lg:p-6 md:p-8 flex flex-col justify-center text-center lg:text-left items-center lg:items-start">
                    <h2 class="text-[1rem] lg:text-[1.75rem] font-bold text-[#ECCB66] mb-4 md:mb-6 tracking-[0.9px]">{{ $title }}</h2>
                    <ul class="space-y-3 text-content text-neutral-i tracking-[0.48px] list-disc ms-6 mb-8 list-inside lg:list-outside text-left w-full">
                        @foreach($bullets as $bullet)
                            <li>{{ $bullet }}</li>
                        @endforeach
                    </ul>
                    @if($ctaText)
                        <x-ui.button :href="$ctaHref" :compact="true" class="!min-w-[240px] lg:!min-w-[240px]">
                            {{ $ctaText }}
                        </x-ui.button>
                    @endif

                    {{-- Feather icon - bottom right --}}
                    <img src="{{ asset($featherIcon) }}" alt="" class="absolute bottom-4 right-4 md:bottom-6 md:right-6 w-16 h-16 md:w-20 md:h-20 opacity-20 pointer-events-none" aria-hidden="true">
                </div>
            </div>
        </x-ui.card>
    </div>
</section>
