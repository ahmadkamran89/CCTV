@extends('layouts.app')

@section('title', $product->name . ' - Dubai CCTV')

@section('content')
<main class="pt-8 pb-24 bg-background">
    <div class="max-w-[1440px] mx-auto px-6 md:px-12">
        {{-- Breadcrumbs --}}
        <nav class="text-sm font-label text-on-surface-variant mb-12">
            <ol class="flex items-center space-x-2">
                <li><a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a></li>
                <li><span class="material-symbols-outlined text-sm">chevron_right</span></li>
                @if($product->category)
                <li><a href="#" class="hover:text-primary transition-colors">{{ $product->category->name }}</a></li>
                <li><span class="material-symbols-outlined text-sm">chevron_right</span></li>
                @endif
                <li class="font-medium text-on-surface">{{ $product->name }}</li>
            </ol>
        </nav>

        {{-- Product Hero Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-32 items-start">
            {{-- Gallery --}}
            <div class="flex flex-col gap-6 lg:sticky lg:top-32">
                <div class="bg-surface-container-low rounded-[2rem] p-12 aspect-square flex items-center justify-center group relative overflow-hidden border border-outline-variant/10 shadow-sm">
                    <img id="main-image" alt="{{ $product->name }}" 
                         src="{{ $product->image }}"
                         class="w-full h-full object-contain z-10 drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out" />
                </div>
                
                @if($product->images->isNotEmpty())
                <div class="grid grid-cols-4 gap-4">
                    {{-- Main Image Thumbnail --}}
                    <button onclick="document.getElementById('main-image').src='{{ $product->image }}'"
                            class="bg-surface-container-low rounded-xl p-3 aspect-square flex items-center justify-center border-2 border-primary overflow-hidden transition-all hover:opacity-100">
                        <img alt="Main Image" src="{{ $product->image }}" class="w-full h-full object-contain">
                    </button>
                    
                    {{-- Gallery Images --}}
                    @foreach($product->images as $galleryImg)
                    @php $imgUrl = Storage::url($galleryImg->image_path); @endphp
                    <button onclick="document.getElementById('main-image').src='{{ $imgUrl }}'"
                            class="bg-surface-container-lowest rounded-xl p-3 aspect-square flex items-center justify-center border border-outline-variant/20 hover:border-primary/50 transition-all overflow-hidden opacity-70 hover:opacity-100">
                        <img alt="Gallery Image" src="{{ $imgUrl }}" class="w-full h-full object-contain">
                    </button>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Product Info --}}
            <div class="flex flex-col justify-center py-4">
                <div class="inline-flex items-center gap-3 mb-6">
                    @if($product->badge)
                    <span class="bg-tertiary text-on-tertiary text-[10px] font-extrabold px-3 py-1 rounded uppercase tracking-widest shadow-sm">
                        {{ $product->badge }}
                    </span>
                    @endif
                    <span class="text-sm font-label text-on-surface-variant flex items-center gap-1.5 font-bold">
                        <span class="material-symbols-outlined text-[16px] text-amber-500" style="font-variation-settings: 'FILL' 1;">star</span>
                        5.0 <span class="text-on-surface-variant/70 font-medium ml-1">(24 reviews)</span>
                    </span>
                </div>
                
                <h1 class="font-headline text-[2.5rem] md:text-[3.5rem] leading-[1.1] tracking-[-0.02em] font-extrabold text-on-surface mb-6">
                    {{ $product->name }}
                </h1>
                
                <p class="text-lg text-on-surface-variant font-body leading-relaxed mb-10 max-w-xl">
                    {{ $product->description }}
                </p>
                
                <div class="flex items-end gap-5 mb-10 pb-10 border-b border-outline-variant/20">
                    <span class="text-5xl font-headline font-extrabold text-primary tracking-tight">
                        {{ $product->formatted_price }}
                    </span>
                    @if($product->price > 0)
                    <span class="text-sm font-bold text-tertiary bg-tertiary/10 px-3 py-1 rounded-full mb-2">Instock Delivery</span>
                    @endif
                </div>

                <div class="mb-10">
                    <h3 class="text-xs font-headline font-bold uppercase tracking-widest text-on-surface-variant mb-6">Key Specifications</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-8 text-sm font-body text-on-surface font-medium">
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">videocam</span> 
                            {{ $product->resolution ?? '4K UHD Resolution' }}
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">visibility</span> 
                            {{ $product->night_vision ?? 'Color Night Vision' }}
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">shield</span> 
                            {{ $product->weatherproof ?? 'IP67 Weatherproof' }}
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary text-[20px]">sd_card</span> 
                            {{ $product->storage ?? 'Cloud & Local Storage' }}
                        </li>
                    </ul>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 mb-10">
                    <a href="{{ route('contact', ['product' => $product->id]) }}" 
                       class="flex-1 bg-gradient-to-br from-primary to-primary-container text-on-primary font-headline font-bold py-5 px-8 rounded-2xl hover:opacity-90 transition-all active:scale-[0.98] flex items-center justify-center gap-3 shadow-xl shadow-primary/20">
                        <span class="material-symbols-outlined text-[24px]">support_agent</span> 
                        Request Installation Quote
                    </a>
                    <button class="bg-white border border-outline-variant/30 text-primary font-headline font-bold py-5 px-8 rounded-2xl hover:bg-surface-container transition-all active:scale-[0.98] flex items-center justify-center">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                </div>

                <div class="flex flex-wrap items-center gap-8 text-sm font-body text-on-surface-variant/80 font-semibold">
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-[20px] text-primary">local_shipping</span> Free Shipping</div>
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-[20px] text-primary">verified</span> 1-Year Warranty</div>
                    <div class="flex items-center gap-2"><span class="material-symbols-outlined text-[20px] text-primary">engineering</span> Professional Setup</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Lifestyle Spotlight Section --}}
    <section class="mt-32">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12">
            <div class="bg-surface-container-low rounded-[3rem] p-12 md:p-24 relative overflow-hidden flex flex-col md:flex-row items-center gap-16 lg:gap-24 border border-outline-variant/5">
                <div class="relative z-10 md:w-1/2">
                    <h2 class="text-[2.5rem] leading-tight font-headline font-extrabold tracking-tight mb-8 text-on-surface">Designed for Continuous Security</h2>
                    <p class="text-lg text-on-surface-variant font-body leading-relaxed mb-10 max-w-lg">
                        Dubai CCTV systems aren't just about watching; they are about protecting what matters most. Engineered for the rigors of 24/7 video monitoring, the {{ $product->name }} ensures your peace of mind with unparalleled reliability.
                    </p>
                    <ul class="space-y-8">
                        <li class="flex items-start gap-5">
                            <div class="bg-primary/10 p-4 rounded-2xl text-primary"><span class="material-symbols-outlined text-[28px]">cycle</span></div>
                            <div>
                                <h4 class="font-bold text-on-surface font-headline text-lg mb-1">24/7 Monitoring</h4>
                                <p class="text-on-surface-variant font-body font-medium">Engineered to record continuously without wear or data loss.</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-5">
                            <div class="bg-primary/10 p-4 rounded-2xl text-primary"><span class="material-symbols-outlined text-[28px]">verified_user</span></div>
                            <div>
                                <h4 class="font-bold text-on-surface font-headline text-lg mb-1">AI-Powered Detection</h4>
                                <p class="text-on-surface-variant font-body font-medium">Smart algorithms to ensure you only get notified when it matters.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="relative z-10 md:w-1/2 flex justify-center">
                    <div class="relative w-full aspect-[4/3] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/50">
                        <img alt="Lifestyle Protection" class="w-full h-full object-cover" 
                             src="https://images.unsplash.com/photo-1558002038-10379031968b?q=80&w=2070&auto=format&fit=crop" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Technical Specifications Grid --}}
    <section class="mt-32">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12">
            <div class="text-center mb-16">
                <h2 class="text-[2.5rem] font-headline font-extrabold tracking-tight text-on-surface mb-4">Detailed Specifications</h2>
                <p class="text-on-surface-variant font-body max-w-2xl mx-auto font-medium">Full technical breakdown of the {{ $product->name }} security system.</p>
            </div>
            
            <div class="max-w-5xl mx-auto bg-white rounded-[3rem] border border-outline-variant/20 shadow-sm overflow-hidden p-1">
                <div class="grid grid-cols-1 md:grid-cols-2 divide-y md:divide-y-0 md:divide-x divide-outline-variant/10">
                    {{-- Performance --}}
                    <div class="p-10 md:p-16">
                        <h3 class="text-xl font-headline font-extrabold text-primary mb-8 flex items-center gap-3">
                            <span class="material-symbols-outlined text-[24px]">visibility</span> Vision & Detection
                        </h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Max Resolution</div>
                                <div class="text-sm font-body text-on-surface font-bold">{{ $product->resolution ?? '4K UHD' }}</div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Night Vision</div>
                                <div class="text-sm font-body text-on-surface font-bold">{{ $product->night_vision ?? 'Color' }}</div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Detection</div>
                                <div class="text-sm font-body text-on-surface font-bold">Human/Vehicle AI</div>
                            </div>
                        </div>
                    </div>

                    {{-- Environment & Build --}}
                    <div class="p-10 md:p-16">
                        <h3 class="text-xl font-headline font-extrabold text-primary mb-8 flex items-center gap-3">
                            <span class="material-symbols-outlined text-[24px]">shield</span> Durability & Storage
                        </h3>
                        <div class="space-y-6">
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Weatherproof</div>
                                <div class="text-sm font-body text-on-surface font-bold">{{ $product->weatherproof ?? 'IP67 Rated' }}</div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Local Storage</div>
                                <div class="text-sm font-body text-on-surface font-bold">{{ $product->storage ?? 'MicroSD Slot' }}</div>
                            </div>
                            <div class="grid grid-cols-2 gap-4 border-b border-outline-variant/10 pb-4 flex items-center">
                                <div class="text-[10px] font-headline font-bold uppercase tracking-widest text-on-surface-variant">Connectivity</div>
                                <div class="text-sm font-body text-on-surface font-bold">Dual-Band Wi-Fi</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Dynamic Features Tags --}}
                @if($product->features && count($product->features) > 0)
                <div class="p-10 md:p-16 bg-surface-container-lowest border-t border-outline-variant/10">
                    <h3 class="text-xs font-headline font-bold uppercase tracking-widest text-on-surface-variant mb-8">Additional Highlights</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach($product->features as $feature)
                        <span class="bg-surface-container text-on-surface-variant px-5 py-2.5 rounded-xl text-sm font-bold border border-outline-variant/10">
                            {{ $feature }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Recommended Products --}}
    @if($relatedProducts->isNotEmpty())
    <section class="mt-32 mb-16">
        <div class="max-w-[1440px] mx-auto px-6 md:px-12">
            <h2 class="font-headline text-[2.5rem] font-extrabold text-on-surface tracking-tight mb-12">Recommended Security Pairs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $related)
                <a href="{{ route('products.show', $related) }}" 
                   class="group bg-white rounded-[2.5rem] overflow-hidden hover:bg-surface-container-high transition-all duration-500 flex flex-col h-full cursor-pointer p-5 border border-outline-variant/10 hover:shadow-2xl">
                    <div class="relative aspect-square w-full mb-6 bg-surface-container/30 rounded-3xl overflow-hidden flex items-center justify-center p-8">
                        <img alt="{{ $related->name }}" src="{{ $related->image }}" 
                             class="object-contain w-full h-full mix-blend-multiply group-hover:scale-105 transition-transform duration-500" />
                    </div>
                    <div class="flex flex-col flex-grow px-2 pb-2">
                        <h3 class="font-headline font-bold text-lg text-on-surface mb-2 group-hover:text-primary transition-colors">{{ $related->name }}</h3>
                        <div class="mt-auto flex items-center justify-between">
                            <span class="font-headline font-extrabold text-xl text-primary">{{ $related->formatted_price }}</span>
                            <div class="bg-primary/5 text-primary p-2.5 rounded-xl group-hover:bg-primary group-hover:text-on-primary transition-all">
                                <span class="material-symbols-outlined">add_shopping_cart</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</main>
@endsection
