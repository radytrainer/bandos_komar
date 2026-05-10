@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" />

<style>
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }

    .hero-gradient {
        background: linear-gradient(to bottom, rgba(30, 45, 83, 0.7), rgba(30, 45, 83, 0.9));
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 15s linear infinite;
        width: fit-content;
    }

    .animate-scroll:hover {
        animation-play-state: paused;
    }

    .pause:hover {
        animation-play-state: paused;
    }
</style>
@endsection

@section('content')

@php
$coreValues = [
    ['title' => 'Child-Centered', 'description' => 'Prioritizing the rights and well-being of every child in all actions.'],
    ['title' => 'Inclusiveness', 'description' => 'Ensuring equal participation and access regardless of background.'],
    ['title' => 'Empowerment', 'description' => 'Equipping communities with the tools to lead their own development.'],
    ['title' => 'Sustainability', 'description' => 'Building lasting impacts that thrive for generations to come.'],
    ['title' => 'Integrity', 'description' => 'Operating with transparency, accountability, and ethical standards.'],
];

$whatWeDo = [
    [
        'title' => 'A gateway to a better life through inclusive education and empowerment',
        'description' => 'Bondoskomar Organization empowers underprivileged children and youth in Cambodia through education, life skills, and community support. We focus on child protection, youth development, and partnerships with families and communities—especially in rural areas. Our mission is to help young people grow with dignity, gain confidence, and actively shape a better, more inclusive future.',
        'image' => '/assets/images/whatWeDo1.png',
        'alt' => 'Empowered children in a learning environment in Cambodia'
    ],
    [
        'title' => 'Inclusive opportunities for children and youth in Cambodia',
        'description' => 'We ensure that children and youth, especially from disadvantaged backgrounds, can reach their full potential. Bondoskomar Organization provides access to quality education, life skills, and strong community support to help them grow with confidence and dignity.',
        'image' => '/assets/images/whatWeDo2.png',
        'alt' => 'Youth development program in rural Cambodia'
    ]
];

$strategicGoals = [
    [
        'pillar' => 'Pillar One',
        'title' => 'Economic Development',
        'description' => 'Strengthening community livelihoods through vocational training and agricultural innovation to ensure families can support their children\'s growth and education.',
        'image' => '/assets/images/Economic Development.png',
        'color' => 'bg-bk-orange/10 text-bk-orange'
    ],
    [
        'pillar' => 'Pillar Two',
        'title' => 'Social Progress',
        'description' => 'Enhancing access to quality basic education, healthcare, and child protection services, fostering a safe environment where youth can excel.',
        'image' => '/assets/images/Social Progress.png',
        'color' => 'bg-bk-blue/10 text-bk-blue'
    ],
    [
        'pillar' => 'Pillar Three',
        'title' => 'Environmental Sustainability',
        'description' => 'Promoting climate change adaptation and disaster risk reduction to protect natural resources.',
        'image' => '/assets/images/Environmental Sustainability.png',
        'color' => 'bg-emerald-100 text-emerald-700'
    ],
];

$partners = range(1, 15);
@endphp

<!-- Hero Section -->
<header class="relative h-[600px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img class="w-full h-full object-cover"
            src="/assets/images/welAbout.png"
            alt="Panoramic view of Angkor Wat at sunrise representing Cambodia's heritage and future.">
        <div class="absolute inset-0 hero-gradient"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12 w-full">
        <div class="max-w-2xl">
            <span class="text-bk-orange font-bold tracking-widest uppercase mb-4 block">
                About Bandos Komar
            </span>
            <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight">
                Empowering Every Child's Development Potential
            </h1>
            <p class="font-body-lg text-body-lg text-white/90 mb-8">
                A gateway to a better life through inclusive education and empowerment for all citizens across the kingdom.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#" class="bg-bk-orange text-white px-10 py-4 rounded-full font-extrabold text-lg shadow-lg hover:scale-105 hover:shadow-bk-orange/40 transition-all text-center">
                    Our Programs
                </a>
                <a href="#" class="bg-transparent text-white px-10 py-4 rounded-full font-extrabold text-lg border-2 border-white hover:bg-white hover:text-bk-navy transition-all text-center">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Our Foundation Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <div class="text-center mb-16">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">
                Our Foundation
            </h2>
            <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
            <p class="mt-8 max-w-3xl mx-auto text-text-muted font-body-md">
                Inclusive opportunities for children and youth in Cambodia, built on transparency, integrity, and social justice.
            </p>
        </div>

        <!-- Vision + Mission -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <!-- Vision -->
            <div class="bg-surface-container-low p-10 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-bk-blue/10 rounded-xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-bk-blue text-3xl">visibility</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Vision</h3>
                <p class="font-body-md text-body-md text-text-muted">
                    Every children and youth enjoy full development potential with dignity and sustainability.
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-bk-navy p-10 rounded-2xl shadow-xl">
                <div class="w-14 h-14 bg-bk-orange rounded-xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-white text-3xl">rocket_launch</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-white mb-4">Mission</h3>
                <p class="font-body-md text-body-md text-white/80">
                    The mission of Bandos Komar is to support the human resource development and livelihoods improvement enabling participation opportunities of the communities, public institutions, civil society, the private sector and other relevant stakeholders.
                </p>
            </div>
        </div>

        <!-- Core Values -->
        <div class="text-center mb-12">
            <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Core Values</h3>
            <div class="w-16 h-1 bg-bk-orange mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            @foreach($coreValues as $value)
            <div class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">{{ $value['title'] }}</div>
                <p class="text-xs text-text-muted">{{ $value['description'] }}</p>
            </div>
            @endforeach
        </div>

        <!-- What We Do Section (Loop Concept) -->
        <div class="mt-24 text-center">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">What We Do</h2>
            <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
        </div>

        @foreach($whatWeDo as $item)
        <div class="mt-24 flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            {{-- Toggle text/image order based on iteration --}}
            <div class="flex-1 {{ $loop->iteration % 2 == 0 ? 'lg:order-2' : 'order-2 lg:order-1' }}">
                <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-6">
                    {{ $item['title'] }}
                </h2>
                <p class="font-body-md text-body-md text-text-muted">
                    {{ $item['description'] }}
                </p>
            </div>

            <div class="flex-1 {{ $loop->iteration % 2 == 0 ? 'lg:order-1' : 'order-1 lg:order-2' }}">
                <div class="rounded-3xl overflow-hidden shadow-xl">
                    <img class="w-full h-[400px] object-cover hover:scale-105 transition-transform duration-500"
                        src="{{ $item['image'] }}"
                        alt="{{ $item['alt'] }}">
                </div>
            </div>
        </div>
        @endforeach

        <!-- Strategic Goals -->
        <div class="mt-24">
            <div class="text-center mb-16">
                <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">Country Strategic Goal</h2>
                <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                @foreach($strategicGoals as $goal)
                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100">
                    <div class="h-64 overflow-hidden">
                        <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            src="{{ $goal['image'] }}"
                            alt="{{ $goal['title'] }}">
                    </div>
                    <div class="p-8">
                        <div class="inline-flex items-center justify-center px-4 py-1 rounded-full {{ $goal['color'] }} font-label-md text-label-md mb-6 uppercase tracking-wider">
                            {{ $goal['pillar'] }}
                        </div>
                        <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">{{ $goal['title'] }}</h3>
                        <p class="font-body-md text-body-md text-text-muted mb-6">{{ $goal['description'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Partners -->
<section class="overflow-hidden flex animate-scroll hover:pause">
    <div class="flex min-w-full gap-8 px-8">
        @foreach($partners as $partner)
        <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center">
            <img src="/assets/images/partners/{{ $partner }}.png" alt="Partner {{ $partner }}">
        </div>
        @endforeach
    </div>
    <div class="flex min-w-full gap-8 px-8">
        @foreach($partners as $partner)
        <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center">
            <img src="/assets/images/partners/{{ $partner }}.png" alt="Partner {{ $partner }}">
        </div>
        @endforeach
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.querySelector('.animate-scroll');
        if (scrollContainer) {
            scrollContainer.style.animationPlayState = 'running';
        }
    });
</script>
@endsection