@extends('layouts.app')

@section('title', 'About Us - Dubai CCTV | The Secure Sanctuary')
@section('meta_description', 'Learn about Dubai CCTV - a leading provider of premium CCTV and security systems in the UAE. Our mission, vision, and team.')

@section('content')

<!-- Page Header / Hero -->
<section class="relative py-32 bg-[#1b1c15] overflow-hidden">
    <div class="absolute inset-0">
        <img
            alt="Dubai skyline at night"
            class="w-full h-full object-cover opacity-30"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFhWU34wdnZv90WA-eR6K7Kza680DS2jQBtW_4fhrmTY5a2WMrRYhVPoW26UTgmTo1ZGBrGbvlByoAIQCb2nfWuWgFPuWLKtmyQB-uAXwR8ZtdhmPb1F9a1ixpws2SjCUa8osunInTTT7Fl0Pc1ShKGfRc0Q-f3_QhUI4subUOL5RHQ3QcrJNNHwEkLg1Tp3eaKjU8bpaNo8TKncHk-xPFNLfBLnNBK8B8VRWkFyP13wXRzrwOVEcG63gnlxBXCjjXnuZVeqzorwb1"
        >
        <div class="absolute inset-0 bg-gradient-to-b from-[#1b1c15]/60 to-[#1b1c15]/90"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-8 text-center">
        <span class="font-label text-xs text-primary-container uppercase tracking-widest font-semibold mb-4 block">Our Story</span>
        <h1 class="font-headline text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight">About Us</h1>
        <p class="font-body text-white/70 text-lg max-w-2xl mx-auto leading-relaxed">
            Dubai's most trusted name in professional security systems. Protecting what matters most since 2026.
        </p>
    </div>
</section>

<!-- Story Section -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="font-label text-xs text-primary uppercase tracking-widest font-semibold mb-4 block">Who We Are</span>
                <h2 class="font-headline text-4xl lg:text-5xl font-bold text-on-surface mb-6 leading-tight">
                    The Secure Sanctuary.
                </h2>
                <div class="space-y-4 font-body text-on-surface-variant leading-relaxed text-base">
                    <p>
                        Dubai CCTV was founded with a singular purpose: to make world-class security accessible to every home and business in the UAE. We believe that peace of mind is not a luxury — it is a right.
                    </p>
                    <p>
                        From our state-of-the-art showroom in Dubai Silicon Oasis, we curate only the finest CCTV cameras, NVR systems, and smart security solutions from globally recognized manufacturers. Every product we carry is rigorously tested to meet UAE climate and compliance standards.
                    </p>
                    <p>
                        Our certified installation team has protected over 1,000 residential villas, commercial offices, retail outlets, and warehouses across the Emirates — delivering solutions that are invisible until they're needed most.
                    </p>
                </div>
                <div class="mt-8 flex gap-4">
                    <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 bg-primary text-on-primary px-6 py-3 rounded-full font-label font-semibold text-sm hover:bg-primary/90 transition-colors shadow-sm">
                        <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">support_agent</span>
                        Talk to Us
                    </a>
                    <a href="{{ url('/') }}#products" class="inline-flex items-center gap-2 border border-outline-variant/50 text-on-surface px-6 py-3 rounded-full font-label font-semibold text-sm hover:bg-surface-container transition-colors">
                        <span class="material-symbols-outlined text-base" style="font-variation-settings: 'FILL' 1;">security</span>
                        Browse Products
                    </a>
                </div>
            </div>
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden">
                    <img
                        alt="Dubai CCTV showroom and office"
                        class="w-full h-full object-cover"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFhWU34wdnZv90WA-eR6K7Kza680DS2jQBtW_4fhrmTY5a2WMrRYhVPoW26UTgmTo1ZGBrGbvlByoAIQCb2nfWuWgFPuWLKtmyQB-uAXwR8ZtdhmPb1F9a1ixpws2SjCUa8osunInTTT7Fl0Pc1ShKGfRc0Q-f3_QhUI4subUOL5RHQ3QcrJNNHwEkLg1Tp3eaKjU8bpaNo8TKncHk-xPFNLfBLnNBK8B8VRWkFyP13wXRzrwOVEcG63gnlxBXCjjXnuZVeqzorwb1"
                    >
                </div>
                <div class="absolute -bottom-6 -left-6 bg-primary text-on-primary p-6 rounded-2xl shadow-xl">
                    <div class="font-headline text-3xl font-extrabold">2026</div>
                    <div class="font-label text-xs uppercase tracking-widest text-on-primary/80 mt-1">Est. Year</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission / Vision / Promise -->
<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <span class="font-label text-xs text-primary uppercase tracking-widest font-semibold mb-4 block">Our Purpose</span>
            <h2 class="font-headline text-3xl lg:text-4xl font-bold text-on-surface">What Drives Us</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-primary-container rounded-full flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">target</span>
                </div>
                <h3 class="font-headline text-2xl font-bold text-on-surface mb-4">Mission</h3>
                <p class="font-body text-on-surface-variant leading-relaxed">
                    To empower individuals and businesses with reliable, state-of-the-art security solutions, fostering peace of mind through technological excellence.
                </p>
            </div>
            <!-- Vision -->
            <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-tertiary-container rounded-full flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-tertiary text-3xl" style="font-variation-settings: 'FILL' 1;">visibility</span>
                </div>
                <h3 class="font-headline text-2xl font-bold text-on-surface mb-4">Vision</h3>
                <p class="font-body text-on-surface-variant leading-relaxed">
                    To be the premier provider of intelligent sanctuary systems in the Middle East, redefining the standard for residential and commercial safety.
                </p>
            </div>
            <!-- Promise -->
            <div class="bg-surface-container-lowest p-10 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                <div class="w-14 h-14 bg-secondary-container rounded-full flex items-center justify-center mb-8">
                    <span class="material-symbols-outlined text-secondary text-3xl" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                </div>
                <h3 class="font-headline text-2xl font-bold text-on-surface mb-4">Promise</h3>
                <p class="font-body text-on-surface-variant leading-relaxed">
                    Unwavering quality, transparent consultation, and continuous support. We stand by our installations to ensure your environment remains secure.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-20 bg-primary text-on-primary relative overflow-hidden">
    <!-- Abstract background pattern -->
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="max-w-7xl mx-auto px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 text-center">
            <div>
                <div class="font-headline text-4xl lg:text-5xl font-extrabold mb-2">500+</div>
                <div class="font-label text-primary-container font-medium uppercase tracking-widest text-sm">Products</div>
            </div>
            <div>
                <div class="font-headline text-4xl lg:text-5xl font-extrabold mb-2">1000+</div>
                <div class="font-label text-primary-container font-medium uppercase tracking-widest text-sm">Happy Customers</div>
            </div>
            <div>
                <div class="font-headline text-4xl lg:text-5xl font-extrabold mb-2">24/7</div>
                <div class="font-label text-primary-container font-medium uppercase tracking-widest text-sm">Support</div>
            </div>
            <div>
                <div class="font-headline text-4xl lg:text-5xl font-extrabold mb-2">2026</div>
                <div class="font-label text-primary-container font-medium uppercase tracking-widest text-sm">Established</div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-8">
        <h2 class="font-headline text-3xl lg:text-4xl font-bold text-on-surface mb-16 text-center">Our Leadership</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- CEO -->
            <div class="group">
                <div class="aspect-[3/4] rounded-xl overflow-hidden mb-6 bg-surface-container-high relative">
                    <img
                        alt="CEO"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaF2VGoJWLr4Sp2-eJ44p1TyxPTU2DJMbgaY4wfwfZ5Hr3JL06rlP7WeRp8zWas-fHReJyiZVFtVtS_StFJHeZno2C8k4Y38kcbz170qzyfcXz0Ox6_-LK87ymSMfJnDJjoRrGbYoEs6OXxzodAKco8QA0iuEHVzUsDCerx0porDt_FfDuh8YCYXDpD3mFBI28UPrWzj12e1_WdipTAr7JUcrnTvLDSLOxWM9X8m4OoyK-kXn6I35XBWXw-Bo7rQGitH1LD2kN_5Ef"
                    >
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 mix-blend-multiply"></div>
                </div>
                <h3 class="font-headline text-xl font-bold text-on-surface mb-1">Ahmed Al Maktoum</h3>
                <p class="font-label text-primary font-medium">Chief Executive Officer</p>
            </div>
            <!-- Security Consultant -->
            <div class="group">
                <div class="aspect-[3/4] rounded-xl overflow-hidden mb-6 bg-surface-container-high relative">
                    <img
                        alt="Security Consultant"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFroJabCpe30VieXHUM7SMuWmwAtLwE59jeBvkVPOt7bM-0NMzHcnQvterJalmmv7JfsqNqTHWXLtAyq9ZwtU-UsnW4-l20cvPgh7rY7nxC0KmDildJNx9fIUC5MmGTXZfjn4vpA5TgdfN82ZbJ39eXbpz9qKjE-MY44nlC8EQGatUQOm4nBF6Ts4StxrI4Dtp0X6wdpLbtIRXQQuVrwttRQFwhg2AAjDK-LgYk6yIj3ArZghALU924F3th-mbEWI2rr4IgXhH8yL4"
                    >
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 mix-blend-multiply"></div>
                </div>
                <h3 class="font-headline text-xl font-bold text-on-surface mb-1">Sarah Hassan</h3>
                <p class="font-label text-primary font-medium">Lead Security Consultant</p>
            </div>
            <!-- Support Lead -->
            <div class="group">
                <div class="aspect-[3/4] rounded-xl overflow-hidden mb-6 bg-surface-container-high relative">
                    <img
                        alt="Support Lead"
                        class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPY1inWnZZZcnj7T03Nwq02S2KJzu81IN3xvMLWOevAevEJheZ8AZyJHVaCF_5wmE_hXB2KCUIkG5iMQi5Rd87mytPrdvSofN2QAYIs9WIW7dx5zZaxeiCfc5hpX_inyKCqNSjES-4GhUVVJ96ZF2D-qSFHDJW5DerR2QPjsqeaXfFZHV_k2SnRoiyBZDFsXIWR8pVtEc08t4TmKVR5k_ShuT8CqVYVdh_oFcfutxd4KGEkD7lSRl3ug0K8SasEcW4Ol7jWbgc8BAf"
                    >
                    <div class="absolute inset-0 bg-primary/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500 mix-blend-multiply"></div>
                </div>
                <h3 class="font-headline text-xl font-bold text-on-surface mb-1">Tariq Mahmood</h3>
                <p class="font-label text-primary font-medium">Head of Customer Support</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-24 bg-surface-container-low">
    <div class="max-w-7xl mx-auto px-8">
        <div class="text-center mb-16">
            <span class="font-label text-xs text-primary uppercase tracking-widest font-semibold mb-4 block">Our Edge</span>
            <h2 class="font-headline text-3xl lg:text-4xl font-bold text-on-surface">Why Choose Dubai CCTV?</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">verified</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">Certified Technicians</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">All our engineers hold internationally recognized CCTV installation certifications.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">precision_manufacturing</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">Premium Brands Only</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">We stock Hikvision, Dahua, Axis, and other top-tier security brands.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">support_agent</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">24/7 After-Sales Support</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">Our support team is always reachable via phone, email, or WhatsApp.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">local_shipping</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">Free UAE Delivery</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">Free same-day or next-day delivery on all orders within the UAE.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">shield</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">Warranty Guaranteed</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">All products come with a minimum 1-year warranty with optional extension plans.</p>
                </div>
            </div>
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center flex-shrink-0">
                    <span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">currency_exchange</span>
                </div>
                <div>
                    <h4 class="font-headline font-semibold text-on-surface mb-2">Competitive Pricing</h4>
                    <p class="font-body text-sm text-on-surface-variant leading-relaxed">Best price guarantee on all security products. We match any verified UAE quote.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-surface border-t border-outline-variant/20">
    <div class="max-w-3xl mx-auto px-8 text-center">
        <h2 class="font-headline text-3xl font-bold text-on-surface mb-4">Ready to strengthen your security?</h2>
        <p class="font-body text-on-surface-variant mb-8">Speak with one of our security specialists for a free, no-obligation consultation.</p>
        <a href="{{ url('/contact') }}" class="inline-flex items-center gap-2 bg-primary text-on-primary px-10 py-4 rounded-full font-label font-bold text-base hover:bg-primary/90 transition-colors shadow-lg">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">call</span>
            Contact Us Today
        </a>
    </div>
</section>

@endsection
