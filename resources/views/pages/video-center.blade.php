@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" />
<style>
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
.material-symbols-outlined.fill {
    font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
.video-modal {
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
.video-modal.active {
    opacity: 1;
    pointer-events: auto;
}
.video-modal iframe {
    width: 90vw;
    max-width: 960px;
    aspect-ratio: 16 / 9;
    border-radius: 0.5rem;
}
.video-modal-close {
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
</style>
@endsection

@section('content')

@php
function youtubeId($url) {
    preg_match('/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $url, $matches);
    return $matches[1] ?? '';
}


$videoData = [
    [
        'link' => 'https://youtu.be/UizLZDLvr9c?si=rAZqnUzRMD9LkONd',
        'title' => 'Bandoskomar Organization'
    ],
    [
        'link' => 'https://youtu.be/SgMstzUIKpE?si=oH8D0GU5O1yH4wKb',
        'title' => 'Bandos Komar'
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
            Our Impact in Videos
        </h1>

        <p class="font-body-lg text-body-lg text-primary-fixed-dim max-w-2xl mx-auto mb-space-xl">
            See how your contributions are transforming classrooms and providing sustainable health resources to over 50 villages in rural Cambodia.
        </p>
        <a href="{{ route('get-involved.support-us') }}" class="inline-block bg-bk-orange text-white px-space-2xl py-space-md rounded-lg font-label-md hover:opacity-90 transition-opacity">
            Support Us
        </a>
    </div>
</section>

<!-- Gallery Controls -->
<section class="max-w-7xl mx-auto px-margin py-space-xl">
    <div class="flex flex-col md:flex-row justify-between items-end gap-space-lg border-b border-outline-variant/30 pb-space-lg">
        <div class="space-y-space-xs">
            <h2 class="font-headline-lg text-headline-lg text-bk-navy">Video Spotlight</h2>
            <p class="text-text-muted font-body-md">Explore our field reports and community success stories.</p>
        </div>
    </div>
</section>

<!-- Video Grid -->
<section class="max-w-7xl mx-auto px-margin pb-space-2xl">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        @foreach ($videoData as $video)
            @php $id = youtubeId($video['link']); @endphp
            <div class="group cursor-pointer" role="button" tabindex="0" onclick="openVideoModal('{{ $id }}')" onkeydown="if(event.key==='Enter'||event.key===' ')openVideoModal('{{ $id }}')">
                <div class="relative aspect-video rounded-xl overflow-hidden shadow-md shadow-bk-navy/5 mb-space-md">
                    <img alt="{{ $video['title'] }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy" src="https://img.youtube.com/vi/{{ $id }}/maxresdefault.jpg" onerror="this.onerror=null; this.src='https://img.youtube.com/vi/{{ $id }}/hqdefault.jpg'" />
                    <div class="absolute inset-0 bg-bk-navy/20 group-hover:bg-bk-navy/10 transition-colors"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-16 h-16 bg-bk-orange/90 text-white rounded-full flex items-center justify-center shadow-2xl scale-75 group-hover:scale-100 group-hover:bg-bk-orange transition-all duration-300">
                            <span class="material-symbols-outlined fill text-[36px] ml-0.5">play_arrow</span>
                        </div>
                    </div>
                </div>
                <h3 class="font-headline-md text-headline-md text-bk-navy group-hover:text-bk-orange transition-colors">{{ $video['title'] }}</h3>
            </div>
        @endforeach
    </div>
</section>

<!-- Video Modal -->
<div class="video-modal" id="videoModal" role="dialog" aria-modal="true" onclick="closeVideoModal(event)">
    <button class="video-modal-close" onclick="event.stopPropagation(); closeVideoModal()" aria-label="Close video">&times;</button>
    <iframe id="videoIframe" src="" allow="autoplay; fullscreen" allowfullscreen title="YouTube video player"></iframe>
</div>


@endsection

@section('scripts')
<script>
function openVideoModal(youtubeId) {
    document.getElementById('videoIframe').src = 'https://www.youtube.com/embed/' + (youtubeId || 'SgMstzUIKpE') + '?autoplay=1';
    document.getElementById('videoModal').classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeVideoModal(e) {
    if (e && e.target !== e.currentTarget) return;
    document.getElementById('videoIframe').src = '';
    document.getElementById('videoModal').classList.remove('active');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function(e) {
    const modal = document.getElementById('videoModal');
    if (!modal.classList.contains('active')) return;
    if (e.key === 'Escape') closeVideoModal();
});
</script>
@endsection
