@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-[80vh] min-h-[600px] flex items-center overflow-hidden">
    <!-- Hero Image Background -->
    <div class="absolute inset-0 z-0">
        <img src="{{ $page->translated_content['hero']['image'] ?? '/assets/images/hero.png' }}" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-bk-navy/90 via-bk-navy/50 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-block px-4 py-1.5 bg-bk-orange/20 border border-bk-orange/30 rounded-full text-bk-orange font-bold text-xs uppercase tracking-widest mb-6 animate-bounce">
                {{ $page->translated_content['hero']['badge'] ?? 'Impact since 1989' }}
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                {{ $page->translated_content['hero']['title'] ?? 'Empowering Communities' }} <br>
                <span class="text-bk-orange">{{ $page->translated_content['hero']['subtitle'] ?? 'for a Better Future' }}</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl leading-relaxed">
                {{ $page->translated_content['hero']['description'] ?? 'Bandos Komar is a local NGO dedicated to improving education in Cambodia...' }}
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
                <span class="text-bk-orange font-extrabold uppercase tracking-widest text-sm mb-4 block">{{ $page->translated_content['stats']['heading'] ?? 'Who We Are' }}</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-bk-navy mb-6 leading-tight">{{ $page->translated_content['stats']['title'] ?? 'Bandos Komar Association' }}</h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    {{ $page->translated_content['stats']['description'] ?? '' }}
                </p>
                <a href="#" class="inline-flex items-center gap-3 text-bk-navy font-extrabold text-lg group">
                    Read Our Story below
                    <span class="w-10 h-10 rounded-full bg-bk-navy/5 flex items-center justify-center group-hover:bg-bk-navy group-hover:text-white transition-all">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-6">
                @if(isset($page->translated_content['stats']['items']))
                    @foreach($page->translated_content['stats']['items'] as $item)
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
<section class="py-20 bg-[#DDE3EC]">
    <div class="container mx-auto px-4 md:px-6">
        <div class="max-w-3xl mx-auto text-center mb-14">
            <h2 class="text-3xl md:text-[2.15rem] font-black text-bk-navy tracking-tight">Our Core Programs</h2>
            <div class="w-20 h-1 bg-bk-orange rounded-full mx-auto mt-4"></div>
        </div>

        @php
            $programImages = [
                'https://www.bandoskomar.org/wp-content/uploads/2025/10/komama.jpg',
                'https://www.bandoskomar.org/wp-content/uploads/2025/10/photo_2025-07-25_09-07-30.png',
                'https://www.bandoskomar.org/wp-content/uploads/2025/10/image-7.png',
            ];
            $corePrograms = array_slice($page->translated_content['programs'] ?? [], 0, 3);
            if (count($corePrograms) === 0) {
                $corePrograms = [
                    ['title' => 'Early Childhood Education', 'description' => 'Foundational literacy and numeracy through nurturing classrooms and trained facilitators.'],
                    ['title' => 'Life Skills & Youth', 'description' => 'Practical skills, confidence building, and mentorship for adolescents and young adults.'],
                    ['title' => 'Community Development', 'description' => 'Partnership-based projects that strengthen families and local support systems.'],
                ];
            }
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($corePrograms as $index => $program)
                @php
                    $image = $program['image'] ?? $programImages[$index % count($programImages)];
                @endphp
                <article class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
                    <img src="{{ $image }}" alt="{{ $program['title'] ?? 'Program' }}" class="w-full h-64 sm:h-72 lg:h-80 object-cover">
                    <div class="p-6 md:p-7">
                        <h3 class="text-2xl font-extrabold text-bk-navy mb-3 transition-colors duration-300 group-hover:text-bk-orange">{{ $program['title'] ?? '' }}</h3>
                        <p class="text-slate-600 text-[1.02rem] leading-relaxed mb-7">{{ $program['description'] ?? '' }}</p>
                        <a href="#" class="inline-flex items-center gap-2 text-bk-orange text-[1.05rem] font-bold tracking-wide">
                            Learn More
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Selection Section -->
<section class="py-20 bg-white border-t border-slate-200/70">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
            <div class="lg:col-span-7 bg-[#F7FAFF] border border-slate-200 rounded-xl p-7 md:p-8">
                <h2 class="text-3xl md:text-[2rem] font-black text-bk-navy tracking-tight mb-3">Our Selection Process</h2>
                <p class="text-slate-600 text-sm leading-relaxed mb-6">
                    Transparency and fairness are at the heart of our mission. We apply a rigorous, community-centered approach to identify families who need our support most.
                </p>
                <div class="space-y-5">
                    <div class="flex items-start gap-3">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-bk-orange mt-0.5 shrink-0"></i>
                        <p class="text-slate-700 text-sm"><span class="font-bold text-bk-navy">Community Consultation</span><br>Meeting village leaders to understand unique challenges of each village.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-bk-orange mt-0.5 shrink-0"></i>
                        <p class="text-slate-700 text-sm"><span class="font-bold text-bk-navy">In-Depth Needs Assessment</span><br>Conducting household visits to ensure support reaches those most vulnerable.</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-bk-orange mt-0.5 shrink-0"></i>
                        <p class="text-slate-700 text-sm"><span class="font-bold text-bk-navy">Continuous Mentoring</span><br>Regular evaluations to track progress and adjust support as needed.</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/490504848_979551997646287_5088911998051210915_n.jpg" alt="Selection process field visit" class="col-span-2 w-full h-44 object-cover rounded-xl border border-slate-200">
                <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/komar.png" alt="Selection process review" class="w-full h-40 object-cover rounded-xl border border-slate-200">
                <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/image-23.png" alt="Education support planning" class="w-full h-40 object-cover rounded-xl border border-slate-200">
            </div>
        </div>
    </div>
</section>

<!-- Impact Section -->
<section class="py-20 bg-[#EAF0F9] border-y border-slate-200/70">
    <div class="container mx-auto px-4 md:px-6">
        <div class="flex items-end justify-between mb-8 flex-wrap gap-4">
            <div>
                <h2 class="text-3xl md:text-[2rem] font-black text-bk-navy tracking-tight">Recent Impact</h2>
                <p class="text-slate-600 mt-2 text-sm">Updates from the field in Cambodia.</p>
            </div>
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 text-bk-navy font-semibold text-xs uppercase tracking-wide hover:text-bk-orange transition-colors">
                View All Activities
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <article class="lg:col-span-6 relative rounded-xl overflow-hidden min-h-[390px] shadow-sm border border-slate-200 group">
                <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/03.jpg" alt="School garden initiative" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-gradient-to-t from-bk-navy/95 via-bk-navy/40 to-transparent"></div>
                <div class="absolute left-5 right-5 bottom-5 text-white">
                    <span class="inline-block text-[10px] font-bold uppercase tracking-widest bg-bk-orange px-2 py-1 rounded mb-3">Sustainability</span>
                    <h3 class="text-xl md:text-2xl font-black leading-tight">School Garden Initiative</h3>
                    <p class="text-slate-200 mt-1 text-xs max-w-xl">Promoting nutrition and agricultural skills through hands-on learning.</p>
                </div>
            </article>

            <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <article class="group sm:col-span-2 rounded-xl bg-white p-2 shadow-sm border border-slate-200 transition-all">
                    <div class="relative rounded-lg overflow-hidden min-h-[175px]">
                        <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/4444.jpg" alt="Teacher training workshop" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-bk-navy/80 to-transparent"></div>
                        <h3 class="absolute left-3 right-3 bottom-3 text-white font-extrabold text-lg">Teacher Training Workshop</h3>
                    </div>
                </article>
                <article class="group rounded-xl bg-white p-2 shadow-sm border border-slate-200 transition-all">
                    <div class="relative rounded-lg overflow-hidden min-h-[170px]">
                        <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/image-24.png" alt="Back to school drive" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-bk-navy/80 to-transparent"></div>
                        <h3 class="absolute left-3 right-3 bottom-3 text-white font-extrabold text-base">Back to School Drive</h3>
                    </div>
                </article>
                <article class="group rounded-xl bg-white p-2 shadow-sm border border-slate-200 transition-all">
                    <div class="relative rounded-lg overflow-hidden min-h-[170px]">
                        <img src="https://www.bandoskomar.org/wp-content/uploads/2025/10/photo_2025-07-17_08-49-15.jpg" alt="Clean water project" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-bk-navy/80 to-transparent"></div>
                        <h3 class="absolute left-3 right-3 bottom-3 text-white font-extrabold text-base">Clean Water Project</h3>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>

<!-- Call To Action -->
<section class="py-16 bg-[#1C2D72] relative overflow-hidden">
    <i data-lucide="hand-heart" class="absolute right-8 bottom-8 md:right-16 md:bottom-10 w-36 h-36 md:w-48 md:h-48 text-white/10"></i>
    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-[2.45rem] font-black text-white tracking-tight">Help us make a difference.</h2>
            <p class="text-slate-200 mt-3 leading-relaxed text-sm md:text-base">
                Your contribution directly supports the education, health, and empowerment of children in Cambodia.
            </p>
            <div class="flex items-center justify-center gap-3 mt-7 flex-wrap">
                <a href="{{ route('donate') }}" class="bg-bk-orange text-white font-bold px-8 py-3 rounded-lg hover:brightness-110 transition-all shadow-lg shadow-bk-orange/30">Donate Now</a>
                <a href="{{ route('get-involved.support-us') }}" class="text-white text-sm font-semibold border border-white/40 bg-white/5 px-5 py-3 rounded-lg hover:border-white hover:bg-white/10 transition-all">Become a Volunteer</a>
            </div>
        </div>
    </div>
</section>

<!-- Activities Section -->
<section class="py-20 bg-[#ECECEF]">
    <div class="container mx-auto px-4 md:px-6">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl md:text-[2.1rem] font-black text-bk-navy tracking-tight">Our Completed Activities</h2>
            <p class="text-slate-600 mt-3 text-sm">Celebrating milestones and sustainable growth across Cambodia.</p>
        </div>

        @php
            $activities = [
                ['title' => 'School Renovation', 'img' => 'https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Community Well', 'img' => 'https://images.unsplash.com/photo-1470165518248-ff8a47b4d216?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Sustainable Garden', 'img' => 'https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Maternal Health', 'img' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Tech Workshop', 'img' => 'https://images.unsplash.com/photo-1518773553398-650c184e0bb3?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Eco-Playground', 'img' => 'https://images.unsplash.com/photo-1606167668584-78701c57f13d?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Women Entrepreneurship', 'img' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?q=80&w=1400&auto=format&fit=crop'],
                ['title' => 'Reforestation', 'img' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?q=80&w=1400&auto=format&fit=crop'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
            @foreach($activities as $activity)
                <article class="group relative rounded-2xl overflow-hidden bg-white shadow-sm border border-slate-200/80">
                    <img src="{{ $activity['img'] }}" alt="{{ $activity['title'] }}" class="w-full h-64 sm:h-72 lg:h-[320px] object-cover transition-transform duration-500 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/25 to-transparent opacity-100 md:opacity-0 md:group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="absolute inset-x-0 bottom-0 p-3 md:translate-y-3 md:opacity-0 md:group-hover:translate-y-0 md:group-hover:opacity-100 transition-all duration-300">
                        <h3 class="text-white font-semibold text-base drop-shadow transition-all duration-300 md:group-hover:text-bk-orange md:group-hover:translate-x-1">{{ $activity['title'] }}</h3>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('posts.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-md border border-slate-300 text-sm font-semibold text-slate-700 hover:border-bk-navy hover:text-bk-navy transition-all">
                See More Activities
            </a>
        </div>
    </div>
</section>
@endsection
