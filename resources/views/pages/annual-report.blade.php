@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-bk-navy py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-bk-orange opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="container mx-auto px-4 md:px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="text-bk-orange font-bold uppercase tracking-widest text-sm mb-4 block">Info & Resources</span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight">Annual Report</h1>
        </div>
    </div>
</section>

<!-- Draft Content -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 md:px-6 text-center">
        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-8 text-gray-300">
            <i data-lucide="file-text" class="w-12 h-12"></i>
        </div>
        <h2 class="text-3xl font-bold text-bk-navy mb-4">Content Coming Soon</h2>
        <p class="text-gray-500 max-w-xl mx-auto text-lg leading-relaxed">
            This page is currently being drafted. We are gathering our latest annual reports to share our impact with you. Check back later!
        </p>
    </div>
</section>
@endsection
