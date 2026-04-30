@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-bk-navy py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-bk-orange opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="container mx-auto px-4 md:px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="text-bk-orange font-bold uppercase tracking-widest text-sm mb-4 block">What We Do</span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight">Our Integrated Programs</h1>
            <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                We implement a comprehensive approach to child development, focusing on education, health, and community empowerment to create lasting change.
            </p>
        </div>
    </div>
</section>

<!-- Programs List -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4 md:px-6">
        <div class="space-y-24">
            
            <!-- Program 1 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="w-16 h-16 bg-bk-orange/10 rounded-2xl flex items-center justify-center text-bk-orange mb-6">
                        <i data-lucide="book-open" class="w-8 h-8"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-bk-navy mb-6">Early Childhood Care and Education (ECCE)</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        The first five years of a child's life are crucial for cognitive and physical development. Our ECCE program focuses on ensuring that children in rural areas have access to quality early learning environments.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Establishing community-based preschools.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Training preschool teachers in modern, child-centered methodologies.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Providing learning materials and nutritional support.</li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2">
                    <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=2000&auto=format&fit=crop" alt="ECCE" class="rounded-[2.5rem] shadow-xl w-full h-[400px] object-cover">
                </div>
            </div>

            <!-- Program 2 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?q=80&w=2000&auto=format&fit=crop" alt="Primary Education" class="rounded-[2.5rem] shadow-xl w-full h-[400px] object-cover">
                </div>
                <div>
                    <div class="w-16 h-16 bg-bk-orange/10 rounded-2xl flex items-center justify-center text-bk-orange mb-6">
                        <i data-lucide="graduation-cap" class="w-8 h-8"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-bk-navy mb-6">Primary Education Quality Improvement</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        We work directly with primary schools to enhance the quality of education and reduce dropout rates, ensuring students transition successfully to secondary school.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Capacity building for teachers and school directors.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Improving school infrastructure and creating child-friendly environments.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Establishing school libraries and reading programs.</li>
                    </ul>
                </div>
            </div>

            <!-- Program 3 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <div class="w-16 h-16 bg-bk-orange/10 rounded-2xl flex items-center justify-center text-bk-orange mb-6">
                        <i data-lucide="droplets" class="w-8 h-8"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-bk-navy mb-6">WASH and Health</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Good health is a prerequisite for effective learning. Our WASH (Water, Sanitation, and Hygiene) programs ensure that children can learn in a safe and healthy environment.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Constructing latrines and handwashing stations in schools.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Providing access to clean drinking water systems.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Conducting hygiene awareness campaigns for students and parents.</li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?q=80&w=2000&auto=format&fit=crop" alt="WASH Program" class="rounded-[2.5rem] shadow-xl w-full h-[400px] object-cover">
                </div>
            </div>

            <!-- Program 4 -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1529156069898-49953eb1f5ff?q=80&w=2000&auto=format&fit=crop" alt="Community Empowerment" class="rounded-[2.5rem] shadow-xl w-full h-[400px] object-cover">
                </div>
                <div>
                    <div class="w-16 h-16 bg-bk-orange/10 rounded-2xl flex items-center justify-center text-bk-orange mb-6">
                        <i data-lucide="users" class="w-8 h-8"></i>
                    </div>
                    <h2 class="text-3xl font-extrabold text-bk-navy mb-6">Community Empowerment</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        Sustainable change requires community ownership. We empower parents, local authorities, and community leaders to advocate for and support their children's education.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Strengthening School Support Committees (SSCs).</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Organizing parenting education sessions on child development.</li>
                        <li class="flex gap-3 text-gray-600"><i data-lucide="check-circle-2" class="w-6 h-6 text-bk-orange shrink-0"></i> Promoting child rights and protection mechanisms at the village level.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Banner -->
<section class="py-20 bg-bk-orange">
    <div class="container mx-auto px-4 md:px-6 text-center">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-6">Support Our Programs</h2>
        <p class="text-white/90 text-lg mb-10 max-w-2xl mx-auto">
            Your donation directly funds these initiatives, helping us reach more children and communities in need.
        </p>
        <a href="#" class="inline-block bg-white text-bk-navy px-10 py-4 rounded-full font-bold text-lg uppercase tracking-wider hover:scale-105 transition-transform shadow-lg">
            Make a Donation
        </a>
    </div>
</section>
@endsection
