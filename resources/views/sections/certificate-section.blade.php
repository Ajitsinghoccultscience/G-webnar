@props([
    'title' => 'Certificate for participation',
    'body' => 'You will get a certificate of participation after attending the graphology live webinar, which you can use both personally and professionally.',
    'ctaHref' => '#',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'image' => 'images/graphology image/certificate.webp',
])

<section class="w-full section-spacing ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <x-ui.card variant="cream" class="overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8 items-center">
                {{-- Left: Content --}}
                <div class="flex flex-col">
                    <h2 class="text-heading font-bold text-neutral-b mb-4 md:mb-2 tracking-[0.9px] text-center md:text-left">{{ $title }}</h2>
                    <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mb-6 hidden md:block" aria-hidden="true">
                    <p class="text-content text-neutral-b tracking-[0.48px] mb-8 hidden md:block">{{ $body }}</p>
                    <div class="hidden md:block">
                        <x-ui.button :href="$ctaHref" variant="dark" :compact="true" class="!min-w-0">
                            Reserve My Seat @₹49 <span class="line-through opacity-80 ml-1">₹999</span>
                        </x-ui.button>
                    </div>
                </div>

                {{-- Right: Certificate image --}}
                <div class="flex items-center justify-center">
                    <img src="{{ asset($image) }}" alt="Certificate of participation" class="w-full max-w-[280px] h-auto object-contain">
                </div>
            </div>
        </x-ui.card>
    </div>
</section>
