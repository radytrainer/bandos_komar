@extends('layouts.app')

@section('styles')
<style>
    :root {
        --heritage-navy: #0f172a;
        --heritage-orange: #f68b1e;
        --heritage-cream: #fdfbf7;
        --heritage-text: #334155;
    }

    .editorial-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    /* Hero Section */
    .hero-editorial {
        position: relative;
        height: 75vh;
        background: var(--heritage-navy);
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero-image {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url('https://images.unsplash.com/photo-1481627234017-66d40c47395c?q=80&w=2000&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        filter: sepia(0.2) contrast(1.1) brightness(0.6);
        mask-image: linear-gradient(to right, transparent, black 40%);
        -webkit-mask-image: linear-gradient(to right, transparent, black 40%);
    }

    .hero-content {
        position: relative;
        z-index: 10;
        color: white;
    }

    .hero-tagline {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.4em;
        color: var(--heritage-orange);
        margin-bottom: 1rem;
        display: block;
    }

    .hero-title {
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -0.02em;
        margin-bottom: 1.5rem;
    }

    /* Narrative Section */
    .section-narrative {
        padding: 6rem 0;
        background: var(--heritage-cream);
    }

    .narrative-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 4rem;
        align-items: center;
    }

    .narrative-content {
        font-size: 1.125rem;
        line-height: 1.8;
        color: var(--heritage-text);
    }

    .narrative-content p {
        margin-bottom: 2rem;
    }

    .narrative-lead {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--heritage-navy);
        line-height: 1.5;
    }

    .blockquote-editorial {
        position: relative;
        padding: 3rem;
        background: white;
        border-left: 6px solid var(--heritage-orange);
        box-shadow: 0 20px 40px rgba(0,0,0,0.03);
    }

    .blockquote-text {
        font-size: 1.25rem;
        font-weight: 500;
        line-height: 1.6;
        color: var(--heritage-navy);
        margin-bottom: 1.5rem;
    }

    /* Timeline Section */
    .section-timeline {
        padding: 6rem 0;
        background: white;
        text-align: center;
    }

    .timeline-wrapper {
        position: relative;
        margin-top: 4rem;
        display: flex;
        justify-content: space-between;
        padding: 0 2rem;
    }

    .timeline-line {
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        height: 1px;
        background: repeating-linear-gradient(to right, transparent, transparent 5px, #e2e8f0 5px, #e2e8f0 10px);
    }

    .timeline-item {
        position: relative;
        width: 200px;
        z-index: 5;
    }

    .timeline-img-box {
        width: 120px;
        height: 120px;
        margin: 0 auto 1.5rem;
        border-radius: 50%;
        padding: 5px;
        background: white;
        border: 2px solid var(--heritage-orange);
        box-shadow: 0 10px 20px rgba(246, 139, 30, 0.15);
    }

    .timeline-img-box img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        filter: grayscale(0.4);
    }

    .timeline-year {
        font-size: 1.25rem;
        font-weight: 900;
        color: var(--heritage-orange);
        display: block;
        margin-bottom: 0.5rem;
    }

    .timeline-title {
        font-size: 0.875rem;
        font-weight: 800;
        text-transform: uppercase;
        color: var(--heritage-navy);
        letter-spacing: 0.05em;
    }

    /* Stats Section */
    .section-stats {
        padding: 5rem 0;
        background: #f8fafc;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .stat-card {
        padding: 3rem 2.5rem;
        background: white;
        border: 1px solid #f1f5f9;
        transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px rgba(15, 23, 42, 0.05);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 900;
        color: var(--heritage-navy);
        line-height: 1;
        margin-bottom: 0.75rem;
        display: block;
    }

    .stat-label {
        font-size: 0.75rem;
        font-weight: 800;
        color: var(--heritage-orange);
        text-transform: uppercase;
        letter-spacing: 0.15em;
    }

    /* Gallery Section */
    .section-gallery {
        padding: 6rem 0;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .gallery-img {
        border-radius: 4px;
        overflow: hidden;
        height: 450px;
    }

    .gallery-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: contrast(1.05);
    }

    /* Footer CTA */
    .footer-cta {
        padding: 10rem 0;
        background: var(--heritage-navy);
        color: white;
        text-align: center;
        position: relative;
    }

    .cta-title {
        font-size: clamp(2rem, 5vw, 4rem);
        font-weight: 900;
        margin-bottom: 2rem;
    }

    .btn-heritage {
        display: inline-flex;
        align-items: center;
        padding: 1.25rem 3rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        font-size: 0.875rem;
        border-radius: 0;
        transition: all 0.3s;
    }

    .btn-heritage-orange {
        background: var(--heritage-orange);
        color: white;
    }

    .btn-heritage-outline {
        border: 2px solid rgba(255,255,255,0.2);
        color: white;
        margin-left: 1rem;
    }

    @media (max-width: 1024px) {
        .narrative-grid, .stats-grid, .gallery-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }
        .hero-image { width: 100%; opacity: 0.3; mask-image: none; }
        .timeline-wrapper { overflow-x: auto; justify-content: flex-start; gap: 4rem; padding-bottom: 2rem; }
    }
</style>
@endsection

@section('content')
<main>
    <!-- Cinematic Hero -->
    <section class="hero-editorial">
        <div class="hero-image"></div>
        <div class="editorial-container">
            <div class="hero-content">
                <span class="hero-tagline">Bandos Komar Legacy</span>
                <h1 class="hero-title">A Vision That <br> Spanned <br> Generations</h1>
                <p class="text-gray-400 text-lg max-w-lg">How a single conviction in community empowerment evolved into a global legacy of sustainable change.</p>
            </div>
        </div>
    </section>

    <!-- Narrative Section -->
    <section class="section-narrative">
        <div class="editorial-container">
            <div class="narrative-grid">
                <div class="narrative-content">
                    <h2 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-6">The Genesis</h2>
                    <p class="narrative-lead">In the quiet corridors of a modest post-war office, our founder began with a ledger and a promise. He didn't just want to build an organization; he wanted to build a bridge between the forgotten past and a sustainable future.</p>
                    <p>The foundation's first years were marked by relentless advocacy. Every day was spent meeting with local artisans and every night was dedicated to drafting the frameworks that would eventually become our core pillars.</p>
                    <p>His belief was simple: true impact is not measured by the height of the buildings we erect, but by the depth of the roots we nourish within the community. This philosophy has guided every step we've taken since that first day in 1989.</p>
                </div>
                <div class="blockquote-editorial">
                    <i data-lucide="quote" class="w-12 h-12 text-bk-orange/10 absolute -top-4 -left-4"></i>
                    <p class="blockquote-text">"History is not a ghost to be feared, but a foundation to be built upon. Our duty is to ensure the echoes of today inspire the voices of tomorrow."</p>
                    <cite class="text-sm font-black text-gray-500 uppercase tracking-widest">— The Founder, 1989</cite>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section-timeline">
        <div class="editorial-container">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-widest">Evolutionary Legacy</h2>
            <div class="timeline-wrapper">
                <div class="timeline-line"></div>
                
                <div class="timeline-item">
                    <div class="timeline-img-box">
                        <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=400&auto=format&fit=crop" alt="1989">
                    </div>
                    <span class="timeline-year">1989</span>
                    <h4 class="timeline-title">The Seed</h4>
                </div>

                <div class="timeline-item">
                    <div class="timeline-img-box">
                        <img src="https://images.unsplash.com/photo-1518709268805-4e9042af9f23?q=80&w=400&auto=format&fit=crop" alt="1994">
                    </div>
                    <span class="timeline-year">1994</span>
                    <h4 class="timeline-title">First Milestone</h4>
                </div>

                <div class="timeline-item">
                    <div class="timeline-img-box">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=400&auto=format&fit=crop" alt="1999">
                    </div>
                    <span class="timeline-year">1999</span>
                    <h4 class="timeline-title">Going Global</h4>
                </div>

                <div class="timeline-item">
                    <div class="timeline-img-box">
                        <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=400&auto=format&fit=crop" alt="2005">
                    </div>
                    <span class="timeline-year">2005</span>
                    <h4 class="timeline-title">Digital Dawn</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-stats">
        <div class="editorial-container">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">35+</span>
                    <span class="stat-label">Years of Service</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">12M+</span>
                    <span class="stat-label">Lives Impacted</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">650</span>
                    <span class="stat-label">Heritage Sites</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Content & Gallery Section -->
    <section class="section-gallery">
        <div class="editorial-container">
            <h2 class="text-xs font-black text-gray-400 uppercase tracking-widest mb-12 text-center">The Vision Unfolded</h2>
            
            <div class="gallery-grid">
                <div class="gallery-img">
                    <img src="https://images.unsplash.com/photo-1463171356669-c8d47c893262?q=80&w=1200&auto=format&fit=crop" alt="Heritage 1">
                </div>
                <div class="gallery-img">
                    <img src="https://images.unsplash.com/photo-1541339907198-e08759df93f3?q=80&w=600&auto=format&fit=crop" alt="Heritage 2">
                </div>
            </div>

            <div class="max-w-3xl mx-auto narrative-content">
                <p>Born into a family of scholars, the early childhood of our leadership was spent amidst the ruins of historical sites and the libraries of great institutions. These early experiences instilled a deep reverence for the narrative of humanity.</p>
                <p>By preserving the artifacts and stories of the past, we could provide communities with the grounding they needed to build a more equitable future. Our "Impact-First" philosophy was revolutionary at the time, arguing that conservation and social progress were two sides of the same coin.</p>
                <p>The early years were not without challenges. Funding was scarce, and skepticism was high. Yet, the unwavering presence at project sites—often seen working alongside laborers—earned the respect of both international donors and local inhabitants.</p>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="footer-cta">
        <div class="editorial-container">
            <span class="hero-tagline">The Journey Continues</span>
            <h2 class="cta-title">Continue the Story</h2>
            <div class="flex flex-col sm:flex-row justify-center mt-12">
                <a href="{{ route('donate') }}" class="btn-heritage btn-heritage-orange">Donate to Foundation</a>
                <a href="{{ route('programs') }}" class="btn-heritage btn-heritage-outline">Explore Programs</a>
            </div>
        </div>
    </section>
</main>
@endsection

@section('scripts')
<script>
    lucide.createIcons();
</script>
@endsection
