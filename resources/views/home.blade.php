@extends('layouts.app')

@section('title', config('app.name'))
@section('description', 'Webnar - Your platform for webinars and live events.')

@section('content')
    @include('sections.hero-section', ['ctaHref' => url('/checkout')])
    @include('sections.featured-in')
    @include('sections.what-is-graphology', ['image' => 'images/assets desktop/DESKTOP WHAT IS GRAPHOLOGY.webp'])
    <!-- @include('sections.card-with-image-left', [
        'image' => 'images/assets desktop/Artboard 1 copy.webp',
        'title' => "Who Burglarized Grandma Bessie's Home?",
        'description' => "After the death of her husband, Bessie Ostler, 78 years old, was living alone for the first time in almost fifty years. Because she had poor hearing and was aware of rising crime, Bessie decided that, even though it was expensive, she would feel more secure having an alarm system installed in her home and a security company keeping an eye on her. She soon signed up with High-Tech Armed Patrol Security Company. They had an alarm system installed and then added her home onto one of their patrol routes, Route 13 of the Greenfield area. Bessie immediately felt much safer. Some months later, Bessie became a grandmother for the eighth time and decided to go visit her newest relative the following weekend. She alerted High-Tech Security that she would be away. When Bessie returned from her trip, she was horrified to discover that she had been burglarized while she was gone.",
        'quote' => "For a normal person it's just handwriting, but as a Graphologist You Can Decode the clues hidden in handwriting — unmask the burglar with precision analysis.",
        'bullets' => [
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
            'Lorem ipsum ut pharetra massa velit a aliquam lacus orci pellentesque.',
        ],
        'evidenceImages' => [
            ['name' => 'Davis',   'image' => 'images/assets desktop/1.svg'],
            ['name' => 'Nicholas','image' => 'images/assets desktop/2.svg'],
            ['name' => 'Carter',  'image' => 'images/assets desktop/3.svg'],
        ],
        'footnote' => '(Lorem ipsum dolor sit amet consectetur. Id amet sed urna habitant enim sit pulvinar. Aliquam consequat sagittis fusce quis sed.)',
    ]) -->
    @include('sections.what-you-will-learn')
    @include('sections.how-graphology-works', ['bonusCtaHref' => url('/checkout')])
    @include('sections.certificate-section', ['ctaHref' => url('/checkout')])
    @include('sections.workshop-snapshots', ['images' => ['images/Screenshot 2026-04-19 at 2.34.38 PM.webp', 'images/Screenshot 2026-04-19 at 2.34.48 PM.webp']])
    @include('sections.graphology-steps')
    @include('sections.who-uses-graphology')
    @include('sections.video-testimonials')
    @include('sections.about-institute')
    @include('sections.meet-trainer', ['ctaHref' => url('/checkout')])
    @include('sections.certified-graphologist')
    @include('sections.news-article')
    @include('sections.testimonials')
    @include('sections.value-stack', ['ctaHref' => url('/checkout')])
    @include('sections.faq')
    @include('sections.end-section', ['ctaHref' => url('/checkout')])
    @include('sections.sticky-bar', ['ctaHref' => url('/checkout')])
@endsection
