@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-[80vh] min-h-[600px] flex items-center overflow-hidden">
    <!-- Hero Image Background -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $page->content['hero']['image'] ?? '/assets/images/hero.png' }}" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-bk-navy/90 via-bk-navy/50 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-block px-4 py-1.5 bg-bk-orange/20 border border-bk-orange/30 rounded-full text-bk-orange font-bold text-xs uppercase tracking-widest mb-6 animate-bounce">
                {{ $page->content['hero']['badge'] ?? 'Impact since 1989' }}
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                {{ $page->content['hero']['title'] ?? 'Empowering Communities' }} <br>
                <span class="text-bk-orange">{{ $page->content['hero']['subtitle'] ?? 'for a Better Future' }}</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl leading-relaxed">
                {{ $page->content['hero']['description'] ?? 'Bandos Komar is a local NGO dedicated to improving education in Cambodia...' }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#" class="bg-bk-orange text-white px-10 py-4 rounded-full font-extrabold text-lg shadow-lg hover:scale-105 hover:shadow-bk-orange/40 transition-all text-center">Our Programs</a>
                <a href="#" class="bg-transparent text-white px-10 py-4 rounded-full font-extrabold text-lg border-2 border-white hover:bg-white hover:text-bk-navy transition-all text-center">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-bk-orange font-extrabold uppercase tracking-widest text-sm mb-4 block">{{ $page->content['stats']['heading'] ?? 'Who We Are' }}</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-bk-navy mb-6 leading-tight">{{ $page->content['stats']['title'] ?? 'Bandos Komar Association' }}</h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    {{ $page->content['stats']['description'] ?? '' }}
                </p>
                <a href="#" class="inline-flex items-center gap-3 text-bk-navy font-extrabold text-lg group">
                    Read Our Story 
                    <span class="w-10 h-10 rounded-full bg-bk-navy/5 flex items-center justify-center group-hover:bg-bk-navy group-hover:text-white transition-all">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-6">
                @if(isset($page->content['stats']['items']))
                    @foreach($page->content['stats']['items'] as $item)
                    <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-bk-navy/5 transition-all text-center group">
                        <span class="block text-4xl font-black text-bk-orange mb-2 group-hover:scale-110 transition-transform">{{ $item['value'] ?? '' }}</span>
                        <span class="text-gray-500 font-bold uppercase text-xs tracking-widest">{{ $item['label'] ?? '' }}</span>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Programs Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-bk-orange font-extrabold uppercase tracking-widest text-sm mb-4 block">What We Do</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-bk-navy mb-6 tracking-tight">Our Integrated Programs</h2>
            <div class="w-20 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @if(isset($page->content['programs']))
                @foreach($page->content['programs'] as $program)
                <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-bk-navy/5 group relative overflow-hidden">
                    <div class="absolute -right-12 -top-12 w-32 h-32 bg-bk-navy opacity-[0.02] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                    <div class="w-16 h-16 bg-bk-navy/5 rounded-2xl flex items-center justify-center text-bk-navy mb-8 group-hover:bg-bk-navy group-hover:text-white transition-all duration-300">
                        <i data-lucide="{{ $program['icon'] ?? 'book-open' }}" class="w-8 h-8"></i>
                    </div>
                    <h3 class="text-xl font-extrabold text-bk-navy mb-4">{{ $program['title'] ?? '' }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-8">{{ $program['description'] ?? '' }}</p>
                    <a href="#" class="inline-flex items-center gap-2 text-bk-orange font-bold text-sm uppercase tracking-wider group/link">
                        Learn More <i data-lucide="chevron-right" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                    </a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="bg-bk-navy rounded-[3rem] p-12 md:p-24 text-center relative overflow-hidden group">
            <!-- Animated Circles -->
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-bk-orange/10 rounded-full transition-transform duration-1000 group-hover:scale-150"></div>
            <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-white/5 rounded-full transition-transform duration-1000 group-hover:scale-150"></div>

            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight tracking-tight">{{ $page->content['cta']['title'] ?? 'Support Our Mission' }}</h2>
                <p class="text-gray-300 text-xl mb-12 leading-relaxed">
                    {{ $page->content['cta']['description'] ?? '' }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-6">
                    <a href="#" class="bg-bk-orange text-white px-12 py-5 rounded-full font-black text-xl shadow-2xl hover:scale-105 hover:shadow-bk-orange/50 transition-all">Donate Now</a>
                    <a href="#" class="bg-transparent text-white px-12 py-5 rounded-full font-black text-xl border-2 border-white/30 hover:border-white transition-all">Become a Volunteer</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
