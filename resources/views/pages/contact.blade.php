@extends('layouts.app')

@section('content')
<!-- Page Header -->
<section class="bg-bk-navy py-20 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-bk-orange opacity-10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="container mx-auto px-4 md:px-6 relative z-10 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="text-bk-orange font-bold uppercase tracking-widest text-sm mb-4 block">Get In Touch</span>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 tracking-tight">Contact Us</h1>
            <p class="text-gray-300 text-lg md:text-xl leading-relaxed">
                Have questions about our programs, want to volunteer, or interested in partnering with us? We'd love to hear from you.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-24 bg-white relative">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            
            <!-- Contact Info -->
            <div>
                <h2 class="text-3xl font-extrabold text-bk-navy mb-8">Head Office</h2>
                
                <div class="space-y-8 mb-12">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-bk-orange/10 rounded-full flex items-center justify-center text-bk-orange shrink-0 mt-1">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-bk-navy mb-1">Address</h4>
                            <p class="text-gray-600 leading-relaxed">
                                #12, Street 315, Boeung Kak II,<br>
                                Tuol Kork, Phnom Penh,<br>
                                Cambodia
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-bk-orange/10 rounded-full flex items-center justify-center text-bk-orange shrink-0 mt-1">
                            <i data-lucide="phone" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-bk-navy mb-1">Phone</h4>
                            <p class="text-gray-600 leading-relaxed">
                                +855 (0) 23 881 234<br>
                                +855 (0) 23 881 235
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-bk-orange/10 rounded-full flex items-center justify-center text-bk-orange shrink-0 mt-1">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-bk-navy mb-1">Email</h4>
                            <p class="text-gray-600 leading-relaxed">
                                info@bandoskomar.org
                            </p>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl font-bold text-bk-navy mb-4">Follow Us</h3>
                <div class="flex gap-4">
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center text-bk-navy hover:bg-bk-orange hover:text-white transition-all shadow-sm"><i data-lucide="facebook" class="w-5 h-5"></i></a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center text-bk-navy hover:bg-bk-orange hover:text-white transition-all shadow-sm"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center text-bk-navy hover:bg-bk-orange hover:text-white transition-all shadow-sm"><i data-lucide="instagram" class="w-5 h-5"></i></a>
                    <a href="#" class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center text-bk-navy hover:bg-bk-orange hover:text-white transition-all shadow-sm"><i data-lucide="youtube" class="w-5 h-5"></i></a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-10 md:p-12 rounded-[2.5rem] shadow-2xl border border-gray-100 relative overflow-hidden">
                <div class="absolute -top-24 -right-24 w-48 h-48 bg-bk-navy/5 rounded-full z-0"></div>
                <h2 class="text-2xl font-extrabold text-bk-navy mb-8 relative z-10">Send us a message</h2>
                
                <form class="relative z-10 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">First Name *</label>
                            <input type="text" class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-bk-orange focus:ring-2 focus:ring-bk-orange/20 transition-all" placeholder="John">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Last Name *</label>
                            <input type="text" class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-bk-orange focus:ring-2 focus:ring-bk-orange/20 transition-all" placeholder="Doe">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Email Address *</label>
                        <input type="email" class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-bk-orange focus:ring-2 focus:ring-bk-orange/20 transition-all" placeholder="john@example.com">
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Subject</label>
                        <select class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-bk-orange focus:ring-2 focus:ring-bk-orange/20 transition-all text-gray-600">
                            <option>General Inquiry</option>
                            <option>Donation</option>
                            <option>Volunteering</option>
                            <option>Partnership</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Message *</label>
                        <textarea rows="5" class="w-full px-5 py-3 rounded-xl bg-gray-50 border border-gray-200 focus:outline-none focus:border-bk-orange focus:ring-2 focus:ring-bk-orange/20 transition-all resize-none" placeholder="How can we help you?"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-bk-navy text-white py-4 rounded-xl font-bold text-lg hover:bg-bk-orange transition-colors shadow-lg">
                        Send Message
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<!-- Map Section -->
<section class="h-[400px] w-full bg-gray-200 relative">
    <!-- Placeholder for Google Maps iframe -->
    <div class="absolute inset-0 flex items-center justify-center text-gray-500 flex-col gap-2">
        <i data-lucide="map" class="w-12 h-12"></i>
        <span class="font-bold">Interactive Map Component</span>
    </div>
</section>
@endsection
