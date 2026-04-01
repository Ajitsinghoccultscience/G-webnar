@props([
    'title' => 'Who uses graphology?',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'bgImage' => 'images/graphology image/who uses graphology.webp',
    'iconsPath' => 'images/Graphology (logo)/untitled folder 3',
    'items' => [
        [
            'icon' => 'FBI investigator.svg',
            'title' => 'FBI investigators',
            'titleLine1' => 'FBI',
            'titleLine2' => 'investigators',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
        [
            'icon' => 'HR Professional.svg',
            'title' => 'HR professionals',
            'titleLine1' => 'HR',
            'titleLine2' => 'professionals',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
        [
            'icon' => 'Behavioral analysts.svg',
            'title' => 'Behavioral analysts',
            'titleLine1' => 'Behavioral',
            'titleLine2' => 'analysts',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
        [
            'icon' => 'Judges.svg',
            'title' => 'Judges in forensic cases',
            'titleLine1' => 'Judges in forensic',
            'titleLine2' => 'cases',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
        [
            'icon' => 'psychologist 1.svg',
            'title' => 'Psychologists',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
        [
            'icon' => 'counselors.svg',
            'title' => 'Counselors',
            'description' => 'Lorem ipsum dolor sit amet consectetur. Eget tellus enim bibendum lacus. Quis justo in risus varius urna. Porttitor urna urna fames neque.',
        ],
    ],
])

<section class="w-full  min-h-[42rem] bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset($bgImage) }}');">
    <div class="relative max-w-[1200px] xl:max-w-[1400px] mx-auto section-px py-12 md:py-16 flex flex-col justify-center">
        {{-- Title with wavy underline --}}
        <div class="text-center mb-10 md:mb-12">
            <h2 class="text-heading font-bold text-button-gradient mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- MOBILE: 2-column grid of cards (icon + title only) --}}
        <div class="grid grid-cols-2 gap-4 md:hidden">
            @foreach($items as $item)
                <x-ui.card variant="white" :padding="false" class="flex flex-col items-center justify-center gap-3 p-4 text-center min-h-[9rem]">
                    <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="" class="w-[2.625rem] h-[2.625rem] object-contain shrink-0">
                    <h3 class="text-subheading font-bold text-neutral-b leading-snug">
                        @if(!empty($item['titleLine1']) && !empty($item['titleLine2']))
                            {{ $item['titleLine1'] }}<br>{{ $item['titleLine2'] }}
                        @else
                            {{ $item['title'] }}
                        @endif
                    </h3>
                </x-ui.card>
            @endforeach
        </div>

        {{-- DESKTOP: 2 columns, 3 items each (icon + title + description) --}}
        <div class="hidden md:grid grid-cols-2 gap-6 lg:gap-10">
            @foreach(array_chunk($items, 3) as $column)
                <div class="flex flex-col gap-6 lg:gap-8">
                    @foreach($column as $item)
                        <div class="flex items-center gap-4">
                            <div class="w-[6.625rem] h-[6.875rem] rounded-10 bg-white flex items-center justify-center shrink-0 p-4">
                                <img src="{{ asset($iconsPath . '/' . $item['icon']) }}" alt="" class="w-[2.625rem] h-[2.625rem] object-contain">
                            </div>
                            <div class="flex-1 min-w-0 flex flex-col gap-2">
                                <h3 class="text-subheading font-bold text-white">{{ $item['title'] }}</h3>
                                <p class="text-content text-neutral-h tracking-[0.48px]">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
