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
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/komar.png',
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/komama.jpg',
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/Bandos-Komar-org_2-1.jpg',
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/Library.jpg',
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/image-7.png',
        'https://www.bandoskomar.org/wp-content/uploads/2025/10/image-24.png',
    ];

    $heroImages = collect([$header['image'] ?? null])
        ->merge($timeline->pluck('image'))
        ->filter()
        ->values();

    if ($heroImages->isEmpty()) {
        $heroImages = collect($defaultImages);
    }
@endphp

@section('styles')
<style>
    .history-hero {
        background: linear-gradient(145deg, #0e1c43 0%, #1f2f5f 65%, #27417a 100%);
        min-height: 520px;
        display: flex;
        align-items: center;
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

    .history-hero-title {
        font-size: clamp(3rem, 8vw, 6.5rem);
        line-height: 0.95;
    }

    @media (max-width: 767px) {
        .history-hero {
            min-height: 420px;
        }
    }

    .history-hero-slide {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
        transition: opacity 0.9s ease;
    }

    .history-hero-slide.active {
        opacity: 0.35;
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
        opacity: 0;
        transform: translateY(14px);
        pointer-events: none;
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .history-slide-media:hover .history-slide-content {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .history-slide-image {
        width: 100%;
        height: 32rem;
        object-fit: cover;
    }

    .history-slide-nav {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 0.65rem;
    }

    .history-slide-dot {
        border: 1px solid rgba(18, 42, 104, 0.18);
        border-radius: 0.9rem;
        background: #ffffff;
        color: #17306f;
        padding: 0.7rem 0.6rem;
        font-size: 0.75rem;
        font-weight: 800;
        line-height: 1.2;
        transition: all 0.25s ease;
    }

    .history-slide-dot:hover {
        border-color: rgba(246, 139, 30, 0.45);
        transform: translateY(-2px);
    }

    .history-slide-dot.active {
        background: linear-gradient(120deg, #f68b1e 0%, #f3a64f 100%);
        border-color: transparent;
        color: #ffffff;
        box-shadow: 0 10px 20px rgba(246, 139, 30, 0.3);
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

    .history-slide-media.show-content .history-slide-content {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
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
<section class="history-hero relative overflow-hidden py-16 lg:py-20">
    @foreach($heroImages as $index => $heroImage)
        <img
            src="{{ $heroImage }}"
            alt="Bandos Komar history {{ $index + 1 }}"
            class="history-hero-slide {{ $index === 0 ? 'active' : '' }}"
            data-hero-slide
        >
    @endforeach
    <div class="history-hero-overlay absolute inset-0"></div>

    <div class="history-hero-content container mx-auto px-4 md:px-6 relative z-10 text-center">
        <h1 class="history-hero-title mt-2 font-black text-white">
            {{ $headerTitle ?: __('Bandos Komar History') }}
        </h1>
        <p class="mx-auto mt-5 max-w-3xl text-base leading-relaxed text-white/90 md:text-lg">
            {{ $headerDescription ?: __('Bandos Komar has been empowering Cambodian children and communities through education and child rights programs since 1989.') }}
        </p>
    </div>
</section>

<section class="history-showcase py-24 md:py-20">
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

        <div class="mx-auto mt-8 mb-6 max-w-6xl md:mt-10 md:mb-8">
            <div class="history-slide-nav" data-history-nav>
                @foreach($timeline as $index => $item)
                    <button type="button" class="history-slide-dot" data-slide-dot="{{ $index }}">
                        <span class="block">{{ $item['year'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-[#ecf1fa] pt-32 pb-14 md:pt-40 md:pb-20">
    <div class="pointer-events-none absolute -left-16 top-10 h-44 w-44 rounded-full bg-bk-orange/10 blur-2xl"></div>
    <div class="pointer-events-none absolute -right-12 bottom-8 h-52 w-52 rounded-full bg-bk-navy/10 blur-2xl"></div>
    <div class="container mx-auto px-4 md:px-6">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-black text-bk-navy md:text-4xl">{{ __('Our Legacy Today') }}</h2>
            <p class="mt-3 text-sm text-slate-600 md:text-base">
                {{ __('From education to family support, our mission continues with lasting impact in Cambodia.') }}
            </p>
        </div>

        <div class="mt-10 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
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
            <div class="history-stat-card rounded-2xl border border-white/80 bg-white p-8 text-center shadow-[0_18px_35px_rgba(30,45,83,0.08)]" data-history-stat>
                <p class="text-5xl font-black text-bk-orange">1,000+</p>
                <p class="mt-3 text-lg font-bold text-bk-navy">{{ __('Children Impacted Annually') }}</p>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">{{ __('Children and families engaged each year through education, care, and community programs.') }}</p>
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
        const navDots = Array.from(document.querySelectorAll('[data-slide-dot]'));
        const statCards = document.querySelectorAll('[data-history-stat]');
        const heroSlides = Array.from(document.querySelectorAll('[data-hero-slide]'));
        const slideMediaItems = Array.from(document.querySelectorAll('.history-slide-media'));

        let currentIndex = 0;
        let autoplayTimer = null;
        const intervalMs = 5000;
        let heroIndex = 0;
        let heroTimer = null;

        if (slides.length > 0) {
            const showSlide = (index) => {
                currentIndex = (index + slides.length) % slides.length;

                slides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === currentIndex);
                });
                navDots.forEach((dot, i) => {
                    dot.classList.toggle('active', i === currentIndex);
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
            navDots.forEach((dot) => {
                dot.addEventListener('click', () => {
                    const index = Number(dot.dataset.slideDot);
                    if (!Number.isNaN(index)) {
                        showSlide(index);
                        startAutoplay();
                    }
                });
            });

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

        if (heroSlides.length > 1) {
            const showHeroSlide = (index) => {
                heroIndex = (index + heroSlides.length) % heroSlides.length;
                heroSlides.forEach((slide, i) => {
                    slide.classList.toggle('active', i === heroIndex);
                });
            };

            const startHeroAutoplay = () => {
                if (heroTimer) clearInterval(heroTimer);
                heroTimer = setInterval(() => showHeroSlide(heroIndex + 1), 4500);
            };

            const stopHeroAutoplay = () => {
                if (heroTimer) {
                    clearInterval(heroTimer);
                    heroTimer = null;
                }
            };

            startHeroAutoplay();
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) {
                    stopHeroAutoplay();
                } else {
                    startHeroAutoplay();
                }
            });
        }

        if (slideMediaItems.length > 0) {
            slideMediaItems.forEach((media) => {
                media.addEventListener('click', () => {
                    const isOpen = media.classList.contains('show-content');
                    slideMediaItems.forEach((item) => item.classList.remove('show-content'));
                    if (!isOpen) media.classList.add('show-content');
                });
            });
        }
    })();
</script>
@endsection
