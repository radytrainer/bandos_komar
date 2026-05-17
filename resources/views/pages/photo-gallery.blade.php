@extends('layouts.app')

@section('styles')
<style>
.no-scrollbar::-webkit-scrollbar { display: none; }
.no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

.lightbox {
    position: fixed;
    inset: 0;
    z-index: 9999;
    background: rgba(0, 0, 0, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s ease;
}
.lightbox.active {
    opacity: 1;
    pointer-events: auto;
}
.lightbox img {
    max-width: 90vw;
    max-height: 85vh;
    object-fit: contain;
    border-radius: 0.5rem;
}
.lightbox-close {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    color: #fff;
    font-size: 2rem;
    cursor: pointer;
    background: none;
    border: none;
    line-height: 1;
}
.lightbox-prev,
.lightbox-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    font-size: 2.5rem;
    cursor: pointer;
    background: rgba(0,0,0,0.5);
    border: none;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}
.lightbox-prev:hover,
.lightbox-next:hover {
    background: rgba(0,0,0,0.8);
}
.lightbox-prev { left: 1rem; }
.lightbox-next { right: 1rem; }
.lightbox-counter {
    position: absolute;
    bottom: 1.5rem;
    color: #fff;
    font-size: 0.875rem;
    font-weight: 500;
}
.lightbox-title {
    position: absolute;
    top: 1rem;
    left: 1.5rem;
    color: #fff;
    font-size: 1.125rem;
    font-weight: 600;
}
</style>
@endsection

@section('content')

@php
$photos = [
    asset('/assets/images/hero.png'),
    asset('/assets/images/hero2.png'),
    asset('/assets/images/about1.png'),
    asset('/assets/images/about2.png'),
    asset('/assets/images/about3.png'),
    asset('/assets/images/about4.png'),
    asset('/assets/images/about5.png'),
];

$events = [
    [
        'title' => 'Annual Stakeholder Forum',
        'date' => 'March 12, 2024',
        'photos' => [
            asset('/assets/images/' . rawurlencode('about1.png')),
            asset('/assets/images/about2.png'),
            asset('/assets/images/about3.png'),
        ],
    ],
];
@endphp

<!-- HERO -->
<section class="relative bg-bk-navy py-24 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <img class="w-full h-full object-cover"
            src="{{ asset('/assets/images/hero2.png') }}"
            alt="" />
    </div>

    <div class="relative max-w-7xl mx-auto px-margin text-center">
        <h1 class="font-display-lg text-display-lg text-white mb-space-md">
            Our Impact in Pictures
        </h1>

        <p class="font-body-lg text-body-lg text-primary-fixed-dim max-w-2xl mx-auto mb-space-xl">
            Capturing moments of positive change across Cambodia.
        </p>

        <a href="{{ route('get-involved.support-us') }}" class="inline-block bg-bk-orange text-white px-space-2xl py-space-md rounded-lg font-label-md hover:opacity-90 transition-opacity">
            Support Us
        </a>
    </div>
</section>

<!-- EVENTS -->
<section class="py-space-2xl bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-margin">

        <div class="mb-space-lg">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy flex items-center gap-space-sm">
                Events
            </h2>
            <p class="text-text-muted mt-space-xs">
                Recent gatherings, workshops, and milestones.
            </p>
        </div>

        <div class="flex overflow-x-auto gap-space-lg pb-space-lg no-scrollbar snap-x">

            @foreach ($events as $event)
                <div
                    class="flex-none w-[350px] snap-start cursor-pointer"
                    onclick="openEventLightbox({{ $loop->index }})"
                >

                    <div class="aspect-[16/10] rounded-xl overflow-hidden shadow-md group relative">

                        <img
                            src="{{ $event['photos'][0] ?? '' }}"
                            alt="{{ $event['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                            onerror="this.onerror=null; this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Image+Not+Found'"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-bk-navy/90 via-bk-navy/20 to-transparent"></div>

                        <div class="absolute bottom-0 inset-x-0 p-space-md text-white">
                            <div class="text-label-sm opacity-80 mb-space-xs">
                                {{ $event['date'] }}
                            </div>

                            <h3 class="font-headline-md text-headline-md">
                                {{ $event['title'] }}
                            </h3>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
</section>

<!-- PHOTO GALLERY -->
<section class="py-space-2xl max-w-7xl mx-auto px-margin">

    <div class="mb-space-lg">
        <h2 class="font-headline-lg text-headline-lg text-bk-navy">
            All Photos
        </h2>

        <p class="text-text-muted mt-space-xs max-w-2xl">
            Highlights from our initiatives, events, and community efforts.
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-space-md">

        @foreach ($photos as $photo)
            <div
                class="group relative overflow-hidden rounded-xl bg-surface-container-low shadow-sm cursor-pointer"
                onclick="openLightbox(photos, {{ $loop->index }}, 'Photo {{ $loop->iteration }}')"
            >

                <img
                    src="{{ $photo }}"
                    alt="Photo {{ $loop->iteration }}"
                    class="h-60 w-full object-cover transition duration-500 group-hover:scale-110"
                    loading="lazy"
                    onerror="this.onerror=null; this.src='https://placehold.co/600x400/e2e8f0/64748b?text=Image+Not+Found'"
                >

                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition"></div>

                <div class="absolute bottom-3 left-3 opacity-0 group-hover:opacity-100 transition">
                    <span class="text-white text-label-md">View Photo</span>
                </div>

            </div>
        @endforeach

    </div>
</section>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox" onclick="closeLightbox(event)">
    <button class="lightbox-close" onclick="event.stopPropagation(); closeLightbox()">&times;</button>
    <button class="lightbox-prev" onclick="prevPhoto(event)">&#8249;</button>
    <img id="lightbox-img" src="" alt="" onerror="this.onerror=null; this.src='https://placehold.co/800x600/e2e8f0/64748b?text=Image+Not+Found'">
    <button class="lightbox-next" onclick="nextPhoto(event)">&#8250;</button>
    <span class="lightbox-counter" id="lightbox-counter"></span>
    <span class="lightbox-title" id="lightbox-title"></span>
</div>

@endsection

@section('scripts')
<script>
const photos = @json($photos);
const events = @json($events);
let currentPhotos = photos;
let currentIndex = 0;

function openEventLightbox(eventIndex) {
    const event = events[eventIndex];
    if (!event.photos || event.photos.length === 0) return;
    openLightbox(event.photos, 0, event.title);
}

function openLightbox(photoArray, index, title) {
    if (!photoArray || photoArray.length === 0) return;
    currentPhotos = photoArray;
    currentIndex = index;
    document.getElementById('lightbox-title').textContent = title || '';
    updateLightbox();
    document.getElementById('lightbox').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox(e) {
    if (e && e.target !== e.currentTarget) return;
    document.getElementById('lightbox').classList.remove('active');
    document.body.style.overflow = '';
}

function prevPhoto(e) {
    if (e) e.stopPropagation();
    currentIndex = (currentIndex - 1 + currentPhotos.length) % currentPhotos.length;
    updateLightbox();
}

function nextPhoto(e) {
    if (e) e.stopPropagation();
    currentIndex = (currentIndex + 1) % currentPhotos.length;
    updateLightbox();
}

function updateLightbox() {
    const img = document.getElementById('lightbox-img');
    img.src = currentPhotos[currentIndex];
    img.alt = document.getElementById('lightbox-title').textContent || 'Photo ' + (currentIndex + 1);
    document.getElementById('lightbox-counter').textContent =
        (currentIndex + 1) + ' / ' + currentPhotos.length;
}

document.addEventListener('keydown', function(e) {
    const lightbox = document.getElementById('lightbox');
    if (!lightbox.classList.contains('active')) return;

    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowLeft') prevPhoto(e);
    if (e.key === 'ArrowRight') nextPhoto(e);
});
</script>
@endsection
