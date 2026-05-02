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
            <span class="text-bk-orange font-bold tracking-widest uppercase mb-4 block">About Bandos Komar</span>
            <h1 class="font-display-lg text-display-lg text-white mb-6 leading-tight">Empowering Every Child's
                Development Potential</h1>
            <p class="font-body-lg text-body-lg text-white/90 mb-8">A gateway to a better life through inclusive
                education and empowerment for all citizens across the kingdom.</p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="#" class="bg-bk-orange text-white px-10 py-4 rounded-full font-extrabold text-lg shadow-lg hover:scale-105 hover:shadow-bk-orange/40 transition-all text-center">Our Programs</a>
                <a href="#" class="bg-transparent text-white px-10 py-4 rounded-full font-extrabold text-lg border-2 border-white hover:bg-white hover:text-bk-navy transition-all text-center">Learn More</a>
            </div>
        </div>
    </div>
</header>

<!-- Our Foundation Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-16">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">Our Foundation</h2>
            <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
            <p class="mt-8 max-w-3xl mx-auto text-text-muted font-body-md">Inclusive opportunities for children and
                youth in Cambodia, built on transparency, integrity, and social justice.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            <!-- Vision Card -->
            <div
                class="bg-surface-container-low p-10 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-bk-blue/10 rounded-xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-bk-blue text-3xl">visibility</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Vision</h3>
                <p class="font-body-md text-body-md text-text-muted">Every children and youth enjoy full development
                    potential with dignity and sustainability.</p>
            </div>
            <!-- Mission Card -->
            <div class="bg-bk-navy p-10 rounded-2xl shadow-xl">
                <div class="w-14 h-14 bg-bk-orange rounded-xl flex items-center justify-center mb-6">
                    <span class="material-symbols-outlined text-white text-3xl">rocket_launch</span>
                </div>
                <h3 class="font-headline-md text-headline-md text-white mb-4">Mission</h3>
                <p class="font-body-md text-body-md text-white/80">The mission of Bandos Komar is to support the
                    human resource development and livelihoods improvement enabling participation opportunities of
                    the communities, public institutions, civil society, the private sector and other relevant
                    stakeholders.</p>
            </div>
        </div>
        <!-- Core Values -->
        <div class="text-center mb-12">
            <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Core Values</h3>
            <div class="w-16 h-1 bg-bk-orange mx-auto rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <div
                class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">Child-Centered</div>
                <p class="text-xs text-text-muted">Prioritizing the rights and well-being of every child in all
                    actions.</p>
            </div>
            <div
                class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">Inclusiveness</div>
                <p class="text-xs text-text-muted">Ensuring equal participation and access regardless of background.
                </p>
            </div>
            <div
                class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">Empowerment</div>
                <p class="text-xs text-text-muted">Equipping communities with the tools to lead their own
                    development.</p>
            </div>
            <div
                class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">Sustainability</div>
                <p class="text-xs text-text-muted">Building lasting impacts that thrive for generations to come.</p>
            </div>
            <div
                class="p-6 rounded-xl border border-slate-100 bg-surface-muted text-center hover:bg-white hover:shadow-lg transition-all">
                <div class="font-bold text-bk-navy mb-2">Integrity</div>
                <p class="text-xs text-text-muted">Operating with transparency, accountability, and ethical
                    standards.</p>
            </div>
        </div>

        <!-- What We Do Section -->
        <div class="mt-24 text-center">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">What We Do</h2>
            <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full"></div>
        </div>
        <div class="mt-16 flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            <div class="flex-1 order-2 lg:order-1">
                <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-6">A gateway to a better life through
                    inclusive education and empowerment</h2>
                <p class="font-body-md text-body-md text-text-muted">
                    Bondoskomar Organization empowers underprivileged children and youth in Cambodia through
                    education, life skills, and community support. We focus on child protection, youth development,
                    and partnerships with families and communities—especially in rural areas. Our mission is to help
                    young people grow with dignity, gain confidence, and actively shape a better, more inclusive
                    future.
                </p>
            </div>
            <div class="flex-1 order-1 lg:order-2">
                <div class="rounded-3xl overflow-hidden shadow-xl">
                    <img class="w-full h-[400px] object-cover hover:scale-105 transition-transform duration-500"
                        src="/assets/images/whatWeDo1.png"
                        alt="Empowered children in a learning environment in Cambodia">
                </div>
            </div>
        </div>
        <div class="mt-24 flex flex-col lg:flex-row items-center gap-12 lg:gap-24">
            <div class="flex-1">
                <div class="rounded-3xl overflow-hidden shadow-xl">
                    <img class="w-full h-[400px] object-cover hover:scale-105 transition-transform duration-500"
                        src="/assets/images/whatWeDo2.png"
                        alt="Youth development program in rural Cambodia">
                </div>
            </div>
            <div class="flex-1">
                <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-6">Inclusive opportunities for children
                    and youth in Cambodia</h2>
                <p class="font-body-md text-body-md text-text-muted">
                    We ensure that children and youth, especially those from disadvantaged backgrounds, can reach
                    their full potential. Bondoskomar Organization provides access to quality education, life
                    skills, and strong community support to help them grow with confidence and dignity. Our programs
                    emphasize child protection, youth empowerment, and collaboration with families, communities, and
                    public institutions across rural Cambodia—building a more sustainable and inclusive future.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Country Strategic Goals Section -->
<section class="py-24 bg-surface-muted overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">Country Strategic Goal</h2>
                <p class="font-body-md text-body-md text-bk-orange font-bold mb-2">The Primary Objective</p>
                <p class="font-body-md text-body-md text-text-muted italic">"By 2019, children and youths enjoy full
                    potential of their rights in living with dignity to become human capital for sustainable
                    development of the society."</p>
            </div>
            <div class="flex space-x-2 pb-2">
                <div class="w-3 h-3 rounded-full bg-bk-orange"></div>
                <div class="w-3 h-3 rounded-full bg-bk-blue"></div>
                <div class="w-3 h-3 rounded-full bg-bk-navy"></div>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Pillar 1: Economic Development -->
            <div
                class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100">
                <div class="h-64 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="/assets/images/Economic Development.png"
                        alt="Modern economic development scene in Cambodia.">
                </div>
                <div class="p-8">
                    <div
                        class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-bk-orange/10 text-bk-orange font-label-md text-label-md mb-6 uppercase tracking-wider">
                        Pillar One</div>
                    <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Economic Development</h3>
                    <p class="font-body-md text-body-md text-text-muted mb-6">Strengthening community livelihoods
                        through vocational training and agricultural innovation to ensure families can support their
                        children's growth and education.</p>
                </div>
            </div>
            <!-- Pillar 2: Social Progress -->
            <div
                class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100">
                <div class="h-64 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="/assets/images/Social Progress.png"
                        alt="Cambodian children learning in a modern facility.">
                </div>
                <div class="p-8">
                    <div
                        class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-bk-blue/10 text-bk-blue font-label-md text-label-md mb-6 uppercase tracking-wider">
                        Pillar Two</div>
                    <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Social Progress</h3>
                    <p class="font-body-md text-body-md text-text-muted mb-6">Enhancing access to quality basic
                        education, healthcare, and child protection services, fostering a safe environment where
                        youth can excel.</p>
                </div>
            </div>
            <!-- Pillar 3: Environmental Sustainability -->
            <div
                class="group relative bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 border border-slate-100">
                <div class="h-64 overflow-hidden">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        src="/assets/images/Environmental Sustainability.png"
                        alt="Sustainable agriculture in Cambodia.">
                </div>
                <div class="p-8">
                    <div
                        class="inline-flex items-center justify-center px-4 py-1 rounded-full bg-emerald-100 text-emerald-700 font-label-md text-label-md mb-6 uppercase tracking-wider">
                        Pillar Three</div>
                    <h3 class="font-headline-md text-headline-md text-bk-navy mb-4">Environmental Sustainability
                    </h3>
                    <p class="font-body-md text-body-md text-text-muted mb-6">Promoting climate change adaptation
                        and disaster risk reduction to protect the natural resources that communities depend on for
                        a resilient future.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Our Partners Section -->
<section class="py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center mb-12">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy mb-4">Our Partners</h2>
            <div class="w-24 h-1.5 bg-bk-orange mx-auto rounded-full mb-4"></div>
            <p class="font-body-md text-body-md text-text-muted">Grateful for the support from organizations that make our mission possible</p>
        </div>
    </div>
    <div class="relative w-full">
        <div class="flex animate-scroll hover:pause">
            <!-- First set of 15 partner logos -->
            <div class="flex items-center justify-around min-w-full gap-8 px-8">
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/1.png" alt="Partner 1" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/2.png" alt="Partner 2" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/3.png" alt="Partner 3" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/4.png" alt="Partner 4" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/5.png" alt="Partner 5" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/6.png" alt="Partner 6" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/7.png" alt="Partner 7" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/8.png" alt="Partner 8" class="max-w-[80%] max-h-[80%] object-contain"></div>
            </div>
            <div class="flex items-center justify-around min-w-full gap-8 px-8">
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/9.png" alt="Partner 9" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/10.png" alt="Partner 10" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/11.png" alt="Partner 11" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/12.png" alt="Partner 12" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/13.png" alt="Partner 13" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/14.png" alt="Partner 14" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/15.png" alt="Partner 15" class="max-w-[80%] max-h-[80%] object-contain"></div>
                <div class="w-32 h-20 bg-white rounded-lg shadow-sm flex items-center justify-center text-bk-navy font-bold text-sm hover:shadow-md transition-shadow"><img src="/assets/images/partners/1.png" alt="Partner 1" class="max-w-[80%] max-h-[80%] object-contain"></div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script>
    // Optional: Add any JavaScript for enhanced carousel functionality
    document.addEventListener('DOMContentLoaded', function() {
        const scrollContainer = document.querySelector('.animate-scroll');
        if (scrollContainer) {
            scrollContainer.style.animationPlayState = 'running';
        }
    });
</script>
@endsection
@endsection
