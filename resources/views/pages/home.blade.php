@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative h-[80vh] min-h-[600px] flex items-center overflow-hidden">
    <!-- Hero Image Background -->
    <div class="absolute inset-0 z-0">
        <img src="/assets/images/hero.png" alt="Children in Cambodia" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-bk-navy/90 via-bk-navy/50 to-transparent"></div>
    </div>

    <div class="container mx-auto px-4 md:px-6 relative z-10">
        <div class="max-w-3xl">
            <div class="inline-block px-4 py-1.5 bg-bk-orange/20 border border-bk-orange/30 rounded-full text-bk-orange font-bold text-xs uppercase tracking-widest mb-6 animate-bounce">
                Impact since 1989
            </div>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                Empowering Communities <br>
                <span class="text-bk-orange">for a Better Future</span>
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-10 max-w-2xl leading-relaxed">
                Bandos Komar is a local NGO dedicated to improving education in Cambodia, especially in rural areas. We believe every child deserves a chance to learn and grow.
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
                <span class="text-bk-orange font-extrabold uppercase tracking-widest text-sm mb-4 block">Who We Are</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-bk-navy mb-6 leading-tight">Bandos Komar Association</h2>
                <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                    Bandos Komar (BK) is a local NGO dedicated to <strong class="text-bk-navy font-bold">improving education</strong> in Cambodia, especially in rural areas. The organization originated from Partage, which began operating in Cambodia in November <strong class="text-bk-navy">1989</strong>, initially providing basic support and progressively developing projects focused on education—particularly in pre-schools and primary schools in rural areas and surrounding villages.
                </p>
                <a href="#" class="inline-flex items-center gap-3 text-bk-navy font-extrabold text-lg group">
                    Read Our Story 
                    <span class="w-10 h-10 rounded-full bg-bk-navy/5 flex items-center justify-center group-hover:bg-bk-navy group-hover:text-white transition-all">
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </span>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-bk-navy/5 transition-all text-center group">
                    <span class="block text-4xl font-black text-bk-orange mb-2 group-hover:scale-110 transition-transform">1989</span>
                    <span class="text-gray-500 font-bold uppercase text-xs tracking-widest">Founded</span>
                </div>
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-bk-navy/5 transition-all text-center group">
                    <span class="block text-4xl font-black text-bk-orange mb-2 group-hover:scale-110 transition-transform">30+</span>
                    <span class="text-gray-500 font-bold uppercase text-xs tracking-widest">Years Impact</span>
                </div>
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-bk-navy/5 transition-all text-center group">
                    <span class="block text-4xl font-black text-bk-orange mb-2 group-hover:scale-110 transition-transform">100+</span>
                    <span class="text-gray-500 font-bold uppercase text-xs tracking-widest">Communities</span>
                </div>
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 hover:shadow-2xl hover:shadow-bk-navy/5 transition-all text-center group">
                    <span class="block text-4xl font-black text-bk-orange mb-2 group-hover:scale-110 transition-transform">10k+</span>
                    <span class="text-gray-500 font-bold uppercase text-xs tracking-widest">Children Helped</span>
                </div>
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
            <!-- ECCE -->
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-bk-navy/5 group relative overflow-hidden">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-bk-navy opacity-[0.02] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="w-16 h-16 bg-bk-navy/5 rounded-2xl flex items-center justify-center text-bk-navy mb-8 group-hover:bg-bk-navy group-hover:text-white transition-all duration-300">
                    <i data-lucide="book-open" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-extrabold text-bk-navy mb-4">Early Childhood Care</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8">Ensuring children aged 0-5 have access to quality care and early education in their most formative years.</p>
                <a href="#" class="inline-flex items-center gap-2 text-bk-orange font-bold text-sm uppercase tracking-wider group/link">
                    Learn More <i data-lucide="chevron-right" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Primary -->
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-bk-navy/5 group relative overflow-hidden">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-bk-navy opacity-[0.02] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="w-16 h-16 bg-bk-navy/5 rounded-2xl flex items-center justify-center text-bk-navy mb-8 group-hover:bg-bk-navy group-hover:text-white transition-all duration-300">
                    <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-extrabold text-bk-navy mb-4">Primary Education</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8">Supporting local schools to improve the quality of teaching and learning environments for primary students.</p>
                <a href="#" class="inline-flex items-center gap-2 text-bk-orange font-bold text-sm uppercase tracking-wider group/link">
                    Learn More <i data-lucide="chevron-right" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- Empowerment -->
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-bk-navy/5 group relative overflow-hidden">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-bk-navy opacity-[0.02] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="w-16 h-16 bg-bk-navy/5 rounded-2xl flex items-center justify-center text-bk-navy mb-8 group-hover:bg-bk-navy group-hover:text-white transition-all duration-300">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-extrabold text-bk-navy mb-4">Community Empowerment</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8">Working with parents and local authorities to build strong support systems for children's development.</p>
                <a href="#" class="inline-flex items-center gap-2 text-bk-orange font-bold text-sm uppercase tracking-wider group/link">
                    Learn More <i data-lucide="chevron-right" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <!-- WASH -->
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all duration-500 border border-transparent hover:border-bk-navy/5 group relative overflow-hidden">
                <div class="absolute -right-12 -top-12 w-32 h-32 bg-bk-navy opacity-[0.02] rounded-full group-hover:scale-150 transition-transform duration-700"></div>
                <div class="w-16 h-16 bg-bk-navy/5 rounded-2xl flex items-center justify-center text-bk-navy mb-8 group-hover:bg-bk-navy group-hover:text-white transition-all duration-300">
                    <i data-lucide="droplets" class="w-8 h-8"></i>
                </div>
                <h3 class="text-xl font-extrabold text-bk-navy mb-4">WASH & Health</h3>
                <p class="text-gray-500 text-sm leading-relaxed mb-8">Providing clean water, sanitation, and hygiene facilities to schools and communities for better health.</p>
                <a href="#" class="inline-flex items-center gap-2 text-bk-orange font-bold text-sm uppercase tracking-wider group/link">
                    Learn More <i data-lucide="chevron-right" class="w-4 h-4 group-hover/link:translate-x-1 transition-transform"></i>
                </a>
            </div>
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
                <h2 class="text-4xl md:text-6xl font-black text-white mb-8 leading-tight tracking-tight">Support Our Mission</h2>
                <p class="text-gray-300 text-xl mb-12 leading-relaxed">
                    Your contribution can make a real difference in the lives of children in rural Cambodia. Join us in our journey to empower the next generation.
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
