@extends('layouts.app')

@section('title', 'Contact Us - Dubai CCTV | Get in Touch')
@section('meta_description', 'Contact Dubai CCTV for professional security camera installation, quotes, and support. Call us or visit our showroom in Dubai, UAE.')

@section('content')

<!-- Page Header -->
<section class="py-24 bg-surface-container-low border-b border-outline-variant/20">
    <div class="max-w-7xl mx-auto px-8 text-center">
        <span class="font-label text-xs text-primary uppercase tracking-widest font-semibold mb-4 block">Get in Touch</span>
        <h1 class="font-headline text-5xl lg:text-6xl font-extrabold text-on-surface mb-6 leading-tight">Contact Us</h1>
        <p class="font-body text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
            Reach out for a free consultation, product enquiry, or to schedule professional installation across the UAE.
        </p>
    </div>
</section>

<main class="max-w-7xl mx-auto px-8 py-20">

    <!-- Contact Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-24">

        <!-- Contact Form -->
        <div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/15 p-8 md:p-12 shadow-sm">
            <h2 class="font-headline text-2xl font-bold text-on-surface mb-8">Send Us a Message</h2>
            <form class="space-y-6" action="#" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="first_name">First Name</label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            placeholder="Ahmad"
                            class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200"
                        >
                    </div>
                    <div>
                        <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="last_name">Last Name</label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            placeholder="Kamran"
                            class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200"
                        >
                    </div>
                </div>
                <div>
                    <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="email">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="you@example.com"
                        class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200"
                    >
                </div>
                <div>
                    <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="phone">Phone Number</label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        placeholder="+971 55 123 4567"
                        class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200"
                    >
                </div>
                <div>
                    <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="subject">Subject</label>
                    <select
                        id="subject"
                        name="subject"
                        class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200 appearance-none"
                    >
                        <option value="" disabled selected>Select a subject...</option>
                        <option value="product_inquiry">Product Inquiry</option>
                        <option value="installation">Installation Request</option>
                        <option value="quote">Get a Quote</option>
                        <option value="support">Technical Support</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div>
                    <label class="font-label text-sm font-semibold text-on-surface-variant mb-2 block" for="message">Message</label>
                    <textarea
                        id="message"
                        name="message"
                        rows="5"
                        placeholder="Tell us about your security requirements..."
                        class="w-full bg-surface-container rounded-xl border border-outline-variant/30 px-4 py-3 font-body text-on-surface placeholder:text-on-surface-variant/50 focus:outline-none focus:ring-2 focus:ring-primary/40 focus:border-primary transition-all duration-200 resize-none"
                    ></textarea>
                </div>
                <button
                    type="submit"
                    class="w-full bg-primary text-on-primary py-4 rounded-full font-label font-bold text-base hover:bg-primary/90 transition-colors duration-200 shadow-sm flex items-center justify-center gap-2"
                >
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">send</span>
                    Send Message
                </button>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="flex flex-col justify-between">
            <div>
                <h2 class="font-headline text-2xl font-bold text-on-surface mb-8">Our Contact Details</h2>
                <div class="space-y-6 mb-10">
                    <div class="flex items-start gap-4 group">
                        <div class="p-3 bg-primary-container rounded-full text-on-primary-container group-hover:bg-primary group-hover:text-on-primary transition-colors duration-300 flex-shrink-0">
                            <span class="material-symbols-outlined">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-headline font-semibold text-on-surface mb-1">Our Location</h4>
                            <p class="font-body text-on-surface-variant">Dubai Silicon Oasis,<br>Dubai, United Arab Emirates</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 group">
                        <div class="p-3 bg-primary-container rounded-full text-on-primary-container group-hover:bg-primary group-hover:text-on-primary transition-colors duration-300 flex-shrink-0">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <div>
                            <h4 class="font-headline font-semibold text-on-surface mb-1">Email Address</h4>
                            <a href="mailto:info@dubaicctv.ae" class="font-body text-on-surface-variant hover:text-primary transition-colors">info@dubaicctv.ae</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 group">
                        <div class="p-3 bg-primary-container rounded-full text-on-primary-container group-hover:bg-primary group-hover:text-on-primary transition-colors duration-300 flex-shrink-0">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <h4 class="font-headline font-semibold text-on-surface mb-1">Phone</h4>
                            <a href="tel:03354578910" class="font-body text-on-surface-variant hover:text-primary transition-colors">03354578910</a>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 group">
                        <div class="p-3 bg-primary-container rounded-full text-on-primary-container group-hover:bg-primary group-hover:text-on-primary transition-colors duration-300 flex-shrink-0">
                            <span class="material-symbols-outlined">schedule</span>
                        </div>
                        <div>
                            <h4 class="font-headline font-semibold text-on-surface mb-1">Business Hours</h4>
                            <p class="font-body text-on-surface-variant">Mon - Sat: 9:00 AM - 6:00 PM<br>Sunday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- WhatsApp CTA -->
            <div class="mt-8">
                <a
                    class="flex items-center justify-center gap-3 w-full px-6 py-4 bg-[#25D366] hover:bg-[#128C7E] text-white rounded-full font-label font-bold transition-colors duration-300"
                    href="https://wa.me/9713354578910"
                    target="_blank"
                >
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">forum</span>
                    Chat on WhatsApp
                </a>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="mb-24 rounded-xl overflow-hidden bg-surface-container-low h-[400px] relative">
        <img
            alt="Map of Dubai"
            class="w-full h-full object-cover opacity-80 mix-blend-luminosity grayscale hover:grayscale-0 transition-all duration-700"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFhWU34wdnZv90WA-eR6K7Kza680DS2jQBtW_4fhrmTY5a2WMrRYhVPoW26UTgmTo1ZGBrGbvlByoAIQCb2nfWuWgFPuWLKtmyQB-uAXwR8ZtdhmPb1F9a1ixpws2SjCUa8osunInTTT7Fl0Pc1ShKGfRc0Q-f3_QhUI4subUOL5RHQ3QcrJNNHwEkLg1Tp3eaKjU8bpaNo8TKncHk-xPFNLfBLnNBK8B8VRWkFyP13wXRzrwOVEcG63gnlxBXCjjXnuZVeqzorwb1"
        >
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <div class="bg-surface/90 backdrop-blur-sm px-6 py-3 rounded-full shadow-lg flex items-center gap-2 border border-outline-variant/20">
                <span class="material-symbols-outlined text-primary">pin_drop</span>
                <span class="font-headline font-semibold text-on-surface">Dubai, UAE</span>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="max-w-3xl mx-auto mb-16">
        <h2 class="font-headline text-3xl font-bold text-center text-on-surface mb-12">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <details class="group bg-surface-container-lowest rounded-xl border border-outline-variant/15 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-shadow duration-300">
                <summary class="flex items-center justify-between font-headline font-semibold text-lg text-on-surface">
                    Do you provide installation services?
                    <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180 text-primary">expand_more</span>
                </summary>
                <p class="font-body text-on-surface-variant mt-4 leading-relaxed">
                    Yes, we offer comprehensive professional installation services across the UAE. Our certified technicians ensure your CCTV system is optimally positioned, securely mounted, and fully configured for maximum coverage.
                </p>
            </details>
            <details class="group bg-surface-container-lowest rounded-xl border border-outline-variant/15 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-shadow duration-300">
                <summary class="flex items-center justify-between font-headline font-semibold text-lg text-on-surface">
                    What is your return policy?
                    <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180 text-primary">expand_more</span>
                </summary>
                <p class="font-body text-on-surface-variant mt-4 leading-relaxed">
                    We accept returns within 14 days of purchase for unopened and unused items in their original packaging. Please retain your receipt or proof of purchase. Custom installations or activated software products may not be eligible for return.
                </p>
            </details>
            <details class="group bg-surface-container-lowest rounded-xl border border-outline-variant/15 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-shadow duration-300">
                <summary class="flex items-center justify-between font-headline font-semibold text-lg text-on-surface">
                    Do you ship equipment to Pakistan?
                    <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180 text-primary">expand_more</span>
                </summary>
                <p class="font-body text-on-surface-variant mt-4 leading-relaxed">
                    Yes, we arrange secure shipping to major cities in Pakistan. Delivery times typically range from 7 to 14 business days. Shipping costs are calculated at checkout based on weight and destination. Please note that customs duties may apply.
                </p>
            </details>
            <details class="group bg-surface-container-lowest rounded-xl border border-outline-variant/15 p-6 [&_summary::-webkit-details-marker]:hidden cursor-pointer shadow-sm hover:shadow-md transition-shadow duration-300">
                <summary class="flex items-center justify-between font-headline font-semibold text-lg text-on-surface">
                    What warranty do you offer on cameras?
                    <span class="material-symbols-outlined transition duration-300 group-open:-rotate-180 text-primary">expand_more</span>
                </summary>
                <p class="font-body text-on-surface-variant mt-4 leading-relaxed">
                    All our standard CCTV cameras come with a 1-year manufacturer's warranty covering hardware defects. Premium models include a 2-year warranty. We also offer extended warranty packages and annual maintenance contracts for ongoing peace of mind.
                </p>
            </details>
        </div>
    </div>

</main>

@endsection
