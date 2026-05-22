@extends('layouts.app')

@php
    $header = $page->translated_content['header'] ?? [];
    $cleanText = static fn ($value, $fallback = '') => \Illuminate\Support\Str::squish(strip_tags((string) ($value ?: $fallback)));

    $timeline = collect($page->translated_content['timeline'] ?? [])->filter(fn ($item) => !empty($item['year']))->values();
    $fallbackTimeline = collect([
        ['year' => '1989', 'title' => 'Foundation', 'description' => 'Partage starts supporting local education in Cambodia.'],
        ['year' => '1995', 'title' => 'Community Growth', 'description' => 'Partnerships with families and schools expand in rural districts.'],
        ['year' => '2002', 'title' => 'Program Expansion', 'description' => 'Education projects widen to include family support and protection.'],
        ['year' => '2008', 'title' => 'Quality Focus', 'description' => 'Training and child-centered learning methods are rolled out broadly.'],
        ['year' => '2015', 'title' => 'Systems Strengthened', 'description' => 'Long-term school and community systems are reinforced for scale.'],
        ['year' => __('Today'), 'title' => 'Legacy in Action', 'description' => 'BK continues empowering children with modern, community-led programs.'],
    ]);

    $timeline = ($timeline->isNotEmpty() ? $timeline : $fallbackTimeline)
        ->map(function ($item) use ($cleanText) {
            return [
                'year' => $cleanText($item['year'] ?? ''),
                'title' => $cleanText($item['title'] ?? ''),
                'description' => $cleanText($item['description'] ?? '', __('Details coming soon.')),
                'image' => $item['image'] ?? null,
            ];
        })
        ->values();

    $headerTitle = $cleanText($header['title'] ?? '', __('Our History'));
    $headerDescription = $cleanText(
        $header['description'] ?? '',
        __('A legacy of commitment to Cambodian children and rural development.')
    );

    $defaultImages = [
        'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=1200&q=80',
        'https://images.unsplash.com/photo-1544717305-2782549b5136?auto=format&fit=crop&w=1200&q=80',
    ];
@endphp

@section('styles')
<style>
    .history-hero {
        background: linear-gradient(145deg, #0e1c43 0%, #1f2f5f 65%, #27417a 100%);
    }

    .history-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 10% 20%, rgba(246, 139, 30, 0.35) 0%, transparent 45%),
            radial-gradient(circle at 88% 12%, rgba(255, 255, 255, 0.2) 0%, transparent 42%);
        pointer-events: none;
    }

    .history-hero-overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.56), rgba(0, 0, 0, 0.68));
    }

    .history-hero-content {
        animation: heroFadeUp 0.9s ease-out both;
    }

    .history-showcase {
        background: linear-gradient(180deg, #f4f7fd 0%, #edf2fa 100%);
    }

    .history-slider-shell {
        border: 1px solid rgba(19, 36, 80, 0.08);
        background: #ffffff;
        box-shadow: 0 30px 72px rgba(18, 34, 74, 0.16);
        overflow: hidden;
    }

    .history-slide {
        display: none;
        opacity: 0;
    }

    .history-slide.active {
        display: block;
        animation: slideIn 0.5s ease both;
    }

    .history-slide-media {
        position: relative;
    }

    .history-slide-media::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(8, 19, 49, 0.68) 0%, rgba(8, 19, 49, 0.2) 38%, rgba(8, 19, 49, 0) 60%);
        pointer-events: none;
    }

    .history-slide-year {
        color: #0f2d76;
        font-weight: 900;
        font-size: clamp(2.2rem, 4.2vw, 3.25rem);
        line-height: 1;
    }

    .history-slide-title {
        color: #122a68;
        font-weight: 800;
        letter-spacing: -0.01em;
        line-height: 1.2;
    }

    .history-slide-text {
        color: #33415f;
        line-height: 1.75;
        max-width: 34rem;
    }

    .history-slide-content {
        position: absolute;
        left: 1rem;
        right: 1rem;
        bottom: 1rem;
        z-index: 2;
        background: rgba(255, 255, 255, 0.94);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.62);
        border-radius: 1rem;
        padding: 1rem;
        box-shadow: 0 16px 34px rgba(10, 24, 63, 0.18);
    }

    .history-slide-image {
        width: 100%;
        height: 32rem;
        object-fit: cover;
    }

    @media (min-width: 768px) {
        .history-slide-content {
            left: 2rem;
            right: auto;
            max-width: 34rem;
            padding: 1.35rem 1.45rem;
        }

        .history-slide-image {
            height: 38rem;
        }
    }

    @media (max-width: 767px) {
        .history-slide-text {
            max-width: 100%;
        }

        .history-slide-image {
            height: 22rem;
        }
    }

    .history-stat-card {
        animation: statRise 0.75s ease both;
        animation-play-state: paused;
    }

    .history-stat-card.active {
        animation-play-state: running;
    }

    @keyframes heroFadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes statRise {
        from { opacity: 0; transform: translateY(18px) scale(0.98); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }

    @media (prefers-reduced-motion: reduce) {
        .history-hero-content,
        .history-slide,
        .history-stat-card {
            animation: none !important;
            transition: none !important;
        }
    }
</style>
@endsection

@section('content')
<section class="history-hero relative overflow-hidden py-20 lg:py-24">
    <img src="{{ $header['image'] ?? '/assets/images/hero.png' }}" alt="Bandos Komar history" class="absolute inset-0 h-full w-full object-cover opacity-35">
    <div class="history-hero-overlay absolute inset-0"></div>

    <div class="history-hero-content container mx-auto px-4 md:px-6 relative z-10 text-center">
        <h1 class="mt-2 text-4xl font-black leading-tight text-white md:text-6xl lg:text-7xl">
            {{ $headerTitle ?: __('Bandos Komar History') }}
        </h1>
        <p class="mx-auto mt-5 max-w-3xl text-base leading-relaxed text-white/90 md:text-lg">
            {{ $headerDescription ?: __('Bandos Komar has been empowering Cambodian children and communities through education and child rights programs since 1989.') }}
        </p>
    </div>
</section>

<section class="history-showcase py-14 md:py-20">
    <div class="container mx-auto px-4 md:px-6">
        <div class="mx-auto mb-8 max-w-3xl text-center">
            <h2 class="text-3xl font-black text-bk-navy md:text-[2.35rem]">{{ __('Milestones of Progress') }}</h2>
            <p class="mt-3 text-sm text-slate-600 md:text-base">{{ __('A visual timeline of what we have built together over the years.') }}</p>
        </div>

        <div class="history-slider-shell mx-auto max-w-6xl rounded-3xl" data-history-slider>
            <div id="historySlides">
                @foreach($timeline as $index => $item)
                    @php
                        $image = $item['image'] ?? $defaultImages[$index % count($defaultImages)];
                        $milestoneIcons = ['flag', 'heart', 'shield', 'school', 'droplets', 'sparkles'];
                        $milestoneIcon = $milestoneIcons[$index % count($milestoneIcons)];
                    @endphp

                    <article class="history-slide" data-slide>
                        <div class="history-slide-media">
                            <img src="{{ $image }}" alt="Milestone {{ $item['year'] }}" class="history-slide-image">
                            <div class="history-slide-content">
                                <div class="inline-flex items-center gap-2 rounded-full bg-bk-orange/10 px-4 py-1.5 text-xs font-bold text-bk-orange">
                                <i data-lucide="{{ $milestoneIcon }}" class="h-4 w-4"></i>
                                <span>{{ __('Milestone') }} {{ $index + 1 }}</span>
                                </div>

                                <p class="history-slide-year mt-3">{{ $item['year'] }}</p>
                                <h3 class="history-slide-title mt-2 text-2xl md:text-3xl">{{ $item['title'] ?: __('Milestone') }}</h3>
                                <p class="history-slide-text mt-3 text-base">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-[#ecf1fa] py-14 md:py-20">
    <div class="container mx-auto px-4 md:px-6">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-black text-bk-navy md:text-4xl">{{ __('Our Legacy Today') }}</h2>
            <p class="mt-3 text-sm text-slate-600 md:text-base">
                {{ __('From education to family support, our mission continues with lasting impact in Cambodia.') }}
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-2">
            <div class="history-stat-card rounded-2xl border border-white/80 bg-white p-8 text-center shadow-[0_18px_35px_rgba(30,45,83,0.08)]" data-history-stat>
                <p class="text-5xl font-black text-bk-orange">10</p>
                <p class="mt-3 text-lg font-bold text-bk-navy">{{ __('Provinces Served') }}</p>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ __('Working with communities across Cambodia through sustained local partnerships.') }}</p>
            </div>
            <div class="history-stat-card rounded-2xl border border-white/80 bg-white p-8 text-center shadow-[0_18px_35px_rgba(30,45,83,0.08)]" data-history-stat>
                <p class="text-5xl font-black text-bk-orange">36</p>
                <p class="mt-3 text-lg font-bold text-bk-navy">{{ __('Years of Service') }}</p>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ __('Serving children and families continuously since November 1989.') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    (() => {
        const slides = Array.from(document.querySelectorAll('[data-slide]'));
        const slider = document.querySelector('[data-history-slider]');
        const statCards = document.querySelectorAll('[data-history-stat]');

        let currentIndex = 0;
        let autoplayTimer = null;
        const intervalMs = 5000;

        if (slides.length > 0) {
            const showSlide = (index) => {
                currentIndex = (index + slides.length) % slides.length;

                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === currentIndex);
                });
                lucide.createIcons();
            };

            const nextSlide = () => showSlide(currentIndex + 1);

            const stopAutoplay = () => {
                if (autoplayTimer) {
                    clearInterval(autoplayTimer);
                    autoplayTimer = null;
                }
            };

            const startAutoplay = () => {
                stopAutoplay();
                autoplayTimer = setInterval(nextSlide, intervalMs);
            };

            slider?.addEventListener('mouseenter', stopAutoplay);
            slider?.addEventListener('mouseleave', startAutoplay);

            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    stopAutoplay();
                } else {
                    startAutoplay();
                }
            });

            showSlide(0);
            startAutoplay();
        }

        if (statCards.length > 0) {
            const statObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        statObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.35 });

            statCards.forEach((card) => statObserver.observe(card));
        }
    })();
</script>
@endsection
