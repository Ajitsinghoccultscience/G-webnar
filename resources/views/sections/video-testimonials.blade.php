@props([
    'title' => 'Hear straight from our Alumni',
    'underlineSvg' => 'images/graphology image/underline 9.svg',
    'videos' => [
        ['youtube_id' => '', 'name' => 'Somya Tripati', 'attend_date' => 'Attend on 18-02-2026'],
        ['youtube_id' => '', 'name' => 'Somya Tripati', 'attend_date' => 'Attend on 18-02-2026'],
        ['youtube_id' => '', 'name' => 'Somya Tripati', 'attend_date' => 'Attend on 18-02-2026'],
        ['youtube_id' => '', 'name' => 'Somya Tripati', 'attend_date' => 'Attend on 18-02-2026'],
    ],
])

<section class="w-full section-spacing bg-white">
    <div class="max-w-[1200px] xl:max-w-[1400px] mx-auto section-px">
        {{-- Title with wavy underline --}}
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-heading font-bold text-neutral-b mb-3 tracking-[0.9px]">{{ $title }}</h2>
            <img src="{{ asset($underlineSvg) }}" alt="" class="mx-auto w-[157px] h-[14px]" aria-hidden="true">
        </div>

        {{-- Video cards: carousel/slider on all screen sizes --}}
        <x-ui.carousel variant="single" gridAt="none">
            @foreach($videos as $video)
                <x-ui.carousel-slide variant="single" gridAt="none" class="rounded-xl border-2 border-accent-gold overflow-hidden bg-neutral-e aspect-[358/543] relative">
                    @if(!empty($video['youtube_id']))
                        <iframe
                            src="https://www.youtube.com/embed/{{ $video['youtube_id'] }}"
                            title="Testimonial from {{ $video['name'] }}"
                            class="absolute inset-0 w-full h-full"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                    @else
                        {{-- Placeholder for YouTube embed - replace youtube_id in videos array or add iframe here --}}
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 rounded-full bg-secondary flex items-center justify-center">
                                <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    @endif
                    {{-- Name & date overlay --}}
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4">
                        <p class="text-content font-semibold text-white">{{ $video['name'] }}</p>
                        <p class="text-sm text-white/90">{{ $video['attend_date'] }}</p>
                    </div>
                </x-ui.carousel-slide>
            @endforeach
        </x-ui.carousel>
    </div>
</section>
