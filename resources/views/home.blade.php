@extends('layouts.app')

@section('title', 'Dubai CCTV - Precision Security | Home')
@section('meta_description', 'Shop premium EZVIZ and high-end CCTV cameras in Dubai. Advanced smart home security systems with fast UAE delivery.')

@section('content')

<!-- ═══════════ HERO SECTION ═══════════ -->
<section class="relative w-full h-[600px] md:h-[750px] flex items-center bg-surface-container-low overflow-hidden">
    <div class="absolute inset-0 w-full h-full">
        <img alt="Professional high-end CCTV camera mounted on modern minimalist wall"
             class="w-full h-full object-cover opacity-100 object-center"
             src="{{ asset('images/hero-camera.png') }}">
        <div class="absolute inset-0 bg-gradient-to-r from-surface-bright/95 via-surface-bright/70 to-transparent"></div>
    </div>
    <div class="relative z-10 max-w-[1440px] w-full mx-auto px-6 md:px-12">
        <div class="max-w-2xl">
            <span class="font-headline text-xs uppercase tracking-[0.15em] text-primary font-bold mb-4 block">New Series Arrival</span>
            <h1 class="font-headline text-[3.5rem] md:text-[4.5rem] leading-[1.05] tracking-[-0.03em] font-extrabold text-on-surface mb-6">
                Smart Security.<br>Visible Elegance.
            </h1>
            <p class="font-body text-lg text-on-surface-variant mb-10 max-w-lg leading-relaxed">
                Experience the next generation of intelligent home protection. High-definition clarity, AI-powered detection, and seamless integration for your safe sanctuary.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#catalogue" class="bg-gradient-to-br from-primary to-primary-container text-on-primary px-10 py-4 rounded-xl font-bold hover:opacity-90 transition-all active:scale-95 shadow-xl shadow-primary/20">
                    Explore Catalogue
                </a>
                <a href="{{ url('/contact') }}" class="bg-white border border-outline-variant/30 text-primary px-10 py-4 rounded-xl font-bold hover:bg-surface-container transition-all active:scale-95">
                    Get a Quote
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════ MAIN CATALOGUE ═══════════ -->
<main id="catalogue" class="max-w-[1440px] mx-auto px-6 md:px-12 py-24 space-y-32">

    {{-- Loop through Categories --}}
    @foreach($categories as $index => $category)
        @if($category->products->isNotEmpty())
            <section>
                <div class="flex justify-between items-end mb-12">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                             <span class="material-symbols-outlined text-primary text-xl">{{ $category->icon_name }}</span>
                             <span class="font-headline text-xs uppercase tracking-widest text-primary font-bold">Category</span>
                        </div>
                        <h2 class="font-headline text-[2.5rem] font-extrabold text-on-surface tracking-tight mb-2">{{ $category->name }}</h2>
                        <p class="font-body text-on-surface-variant">{{ $category->description ?? 'Precision-engineered security for every corner.' }}</p>
                    </div>
                    <a href="#" class="text-primary font-bold hover:text-primary-container transition-colors flex items-center gap-1 group text-sm uppercase tracking-wider">
                        View All <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>

                {{-- Products Grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($category->products->take(8) as $product)
                        <a href="{{ route('products.show', $product) }}" class="group bg-surface-container-lowest rounded-[2rem] overflow-hidden hover:bg-white border border-transparent hover:border-outline-variant/10 transition-all duration-500 flex flex-col h-full cursor-pointer p-5 hover:shadow-2xl hover:shadow-primary/5">
                            <div class="relative aspect-square w-full mb-6 bg-surface-container/30 rounded-3xl overflow-hidden flex items-center justify-center p-8 group-hover:bg-surface-container/10 transition-colors">
                                @if($product->badge)
                                    <span class="absolute top-4 left-4 bg-tertiary text-on-tertiary text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider z-10">
                                        {{ $product->badge }}
                                    </span>
                                @endif
                                <img alt="{{ $product->name }}"
                                     class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-700"
                                     src="{{ $product->image }}">
                                {{-- Quick Add Hover Button --}}
                                <div class="absolute bottom-4 right-4 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                                     <button class="bg-primary text-on-primary p-3 rounded-2xl shadow-xl">
                                         <span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
                                     </button>
                                </div>
                            </div>
                            <div class="flex flex-col flex-grow px-2">
                                <div class="flex items-center gap-1 mb-3 text-amber-500">
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1">star</span>
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1">star</span>
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1">star</span>
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1">star</span>
                                    <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1">star</span>
                                    <span class="text-xs text-on-surface-variant ml-2 font-bold font-headline">(5.0)</span>
                                </div>
                                <h3 class="font-headline font-bold text-lg text-on-surface mb-1 group-hover:text-primary transition-colors">{{ $product->name }}</h3>
                                <p class="font-body text-sm text-on-surface-variant mb-4 line-clamp-2 leading-relaxed">{{ $product->description }}</p>
                                <div class="mt-auto flex items-center justify-between pt-4 border-t border-outline-variant/10">
                                    <span class="font-headline font-extrabold text-xl text-primary">{{ $product->formatted_price }}</span>
                                    <span class="text-[10px] font-bold text-on-surface-variant uppercase tracking-widest">In Stock</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>

            {{-- Show lifestyle banner after the first category --}}
            @if($index === 0)
                <section class="relative w-full h-[500px] rounded-[3rem] overflow-hidden bg-on-surface flex items-center group">
                    <img alt="Luxurious modern living room with discreet security camera"
                         class="absolute inset-0 w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-110 opacity-60"
                         src="{{ asset('images/lifestyle-banner.png') }}">
                    <div class="absolute inset-0 bg-gradient-to-r from-on-surface via-on-surface/40 to-transparent"></div>
                    <div class="relative z-10 px-12 md:px-24 max-w-2xl">
                        <h2 class="font-headline text-[3rem] font-extrabold leading-tight tracking-tight mb-6 text-surface-bright">
                            Invisible Protection.<br>Visible elegance.
                        </h2>
                        <p class="font-body text-lg text-surface-bright/80 mb-10 leading-relaxed">
                            Integrate our award-winning indoor cameras seamlessly into your home decor. Peace of mind shouldn't compromise your style.
                        </p>
                        <a href="{{ url('/contact') }}" class="inline-block bg-surface-bright text-on-surface px-10 py-4 rounded-xl font-bold hover:bg-white transition-all active:scale-95">
                            Consult an Expert
                        </a>
                    </div>
                </section>
            @endif
        @endif
    @endforeach

</main>

<!-- ═══════════ CTA BANNER ═══════════ -->
<section class="py-32 bg-primary text-on-primary relative overflow-hidden mt-20">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
    <div class="max-w-4xl mx-auto px-8 text-center relative z-10">
        <h2 class="font-headline text-5xl lg:text-6xl font-extrabold mb-8 tracking-tighter">Ready to Secure Your Space?</h2>
        <p class="font-body text-on-primary/80 text-xl leading-relaxed mb-12 max-w-2xl mx-auto">
            Our technology experts will assess your property and design a bespoke security sanctuary.
        </p>
        <div class="flex flex-wrap justify-center gap-6">
            <a href="{{ url('/contact') }}" class="bg-white text-primary px-10 py-4 rounded-xl font-bold text-lg hover:bg-primary-container transition-all shadow-2xl">
                Get Free Consultation
            </a>
            <a href="https://wa.me/9713354578910" target="_blank" class="bg-[#25D366] text-white px-10 py-4 rounded-xl font-bold text-lg hover:opacity-90 transition-all flex items-center gap-3">
                <span class="material-symbols-outlined">forum</span>
                WhatsApp Us
            </a>
        </div>
    </div>
</section>

@endsection
