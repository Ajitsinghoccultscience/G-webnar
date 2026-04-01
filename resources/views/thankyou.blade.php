@extends('layouts.app')

@section('title', 'Thank You - Registration Complete')
@section('description', 'Your webinar registration is complete.')

@section('content')
{{-- Top cream bar --}}
<div class="w-full h-[24px] bg-accent-cream"></div>

<section class="min-h-screen bg-neutral-b text-white py-16 md:py-24 flex items-center justify-center">
    <div class="max-w-[600px] mx-auto section-px text-center">
        <div class="w-20 h-20 rounded-full bg-accent-gold/20 flex items-center justify-center mx-auto mb-8">
            <svg class="w-10 h-10 text-accent-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <h1 class="text-hero font-bold text-button-gradient uppercase tracking-wide mb-4">Thank You!</h1>
        <img src="{{ asset('images/graphology image/underline 9.svg') }}" alt="" class="mx-auto w-[157px] h-[14px] mb-8" aria-hidden="true">
        <p class="text-content text-neutral-i/90 mb-8">Your registration for the Mega Graphology Webinar has been confirmed. We'll send you the details to your email shortly.</p>
        <x-ui.button href="/" variant="primary" class="!min-w-0">
            Back to Home
        </x-ui.button>
    </div>
</section>
@endsection
