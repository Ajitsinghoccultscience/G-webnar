@props([
    'title' => 'What is Graphology?',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'bullets' => [
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
        'Lorem ipsum sapien blandit gravida integer quam quis vestibulum ullamcorper hen.',
    ],
    'image' => null,
])

{{-- Content with image section (Figma 455:52) - content left, image right --}}
<section class="w-full section-spacing bg-white ">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-center">
            {{-- 1. Title - Mobile: first, centered. Desktop: left col --}}
            <div class="order-1 lg:col-start-1 lg:row-start-1">
                <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px] text-center lg:text-left">{{ $title }}</h2>
                <img src="{{ asset($underlineSvg) }}" alt="" class="w-[157px] h-[14px] mx-auto lg:mx-0" aria-hidden="true">
            </div>

            {{-- 2. Image - Mobile: second. Desktop: right col --}}
            <div class="order-2 lg:col-start-2 lg:row-start-1 lg:row-span-2 lg:self-center">
                <div class="w-full max-w-[730px] aspect-[730/423] mx-auto lg:mx-0 lg:ml-auto rounded-10 overflow-hidden bg-neutral-e flex items-center justify-center">
                    @if($image)
                        <img src="{{ $image }}" alt="" class="w-full h-full object-cover">
                    @else
                        <div class="flex flex-col items-center justify-center gap-2 text-neutral-h">
                            <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <span class="text-content font-medium">Image placeholder</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- 3. Bullets - Mobile: third. Desktop: left col --}}
            <div class="order-3 lg:col-start-1 lg:row-start-2">
                <ul class="space-y-4 text-content text-neutral-b tracking-[0.48px] list-disc ms-6 mb-8">
                    @foreach($bullets as $bullet)
                        <li>{{ $bullet }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
