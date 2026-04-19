<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'Dubai CCTV - The Secure Sanctuary')</title>
    <meta name="description" content="@yield('meta_description', 'Dubai CCTV - The Secure Sanctuary. Premium CCTV cameras and security systems for homes and businesses in UAE.')">

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-secondary-container": "#646464",
                        "primary-container": "#549cff",
                        "surface-container": "#f3ebf7",
                        "surface-dim": "#dfd7e3",
                        "secondary-container": "#e2e2e2",
                        "tertiary-fixed-dim": "#ffb4a8",
                        "on-surface": "#1d1a22",
                        "secondary": "#5e5e5e",
                        "on-tertiary-fixed": "#410000",
                        "on-tertiary-container": "#6e0000",
                        "surface-container-low": "#f9f1fd",
                        "surface-bright": "#fef7ff",
                        "on-primary-container": "#003366",
                        "surface-tint": "#005eb4",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary-fixed-variant": "#474747",
                        "on-secondary-fixed": "#1b1b1b",
                        "inverse-on-surface": "#f6eefa",
                        "secondary-fixed": "#e2e2e2",
                        "on-primary-fixed": "#001b3c",
                        "on-tertiary": "#ffffff",
                        "tertiary-fixed": "#ffdad4",
                        "on-background": "#1d1a22",
                        "inverse-primary": "#a8c8ff",
                        "outline": "#717784",
                        "surface-container-high": "#ede6f1",
                        "on-primary-fixed-variant": "#004689",
                        "tertiary-container": "#ff6d59",
                        "on-surface-variant": "#414752",
                        "surface-variant": "#e7e0eb",
                        "primary-fixed-dim": "#a8c8ff",
                        "background": "#fef7ff",
                        "primary": "#005eb4",
                        "on-error": "#ffffff",
                        "surface": "#fef7ff",
                        "on-tertiary-fixed-variant": "#930000",
                        "surface-container-highest": "#e7e0eb",
                        "secondary-fixed-dim": "#c6c6c6",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "outline-variant": "#c1c6d4",
                        "inverse-surface": "#322f37",
                        "error": "#ba1a1a",
                        "tertiary": "#c00000",
                        "on-error-container": "#93000a",
                        "primary-fixed": "#d5e3ff",
                        "error-container": "#ffdad6"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "fontFamily": {
                        "headline": ["Manrope", "sans-serif"],
                        "body": ["Inter", "sans-serif"],
                        "label": ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>
<body class="bg-background text-on-background antialiased selection:bg-primary-container selection:text-on-primary-container">

    {{-- TopNavBar --}}
    <nav class="sticky top-0 w-full z-50 bg-white/80 backdrop-blur-2xl shadow-sm border-b border-outline-variant/10 font-headline text-sm tracking-wide">
        <div class="flex justify-between items-center w-full px-6 md:px-12 py-4 max-w-[1440px] mx-auto">
            <div class="flex items-center gap-12">
                <a class="text-2xl font-extrabold tracking-tighter text-primary" href="{{ url('/') }}">Dubai CCTV</a>
                <div class="hidden md:flex gap-8 items-center font-semibold">
                    <a class="text-on-surface-variant hover:text-primary transition-all duration-300 {{ request()->is('/') ? 'text-primary' : '' }}" href="{{ url('/') }}">Home</a>
                    <a class="text-on-surface-variant hover:text-primary transition-all duration-300 {{ request()->is('about') ? 'text-primary' : '' }}" href="{{ url('/about') }}">About</a>
                    <a class="text-on-surface-variant hover:text-primary transition-all duration-300 {{ request()->is('contact') ? 'text-primary' : '' }}" href="{{ url('/contact') }}">Support</a>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="relative hidden lg:block">
                    <input class="bg-surface-container-low border border-outline-variant/15 rounded-lg py-2 pl-4 pr-10 text-sm focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary-fixed/50 w-64 transition-all" placeholder="Search CCTV products..." type="text"/>
                    <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant cursor-pointer">search</span>
                </div>
                <button class="text-primary hover:scale-110 transition-transform duration-300 active:scale-95">
                    <span class="material-symbols-outlined text-[24px]">shopping_cart</span>
                </button>
                <div class="flex items-center gap-2">
                    @auth
                        <a href="{{ route('admin.products.index') }}" class="text-primary hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-[24px]">dashboard</span>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-primary hover:scale-110 transition-transform duration-300">
                            <span class="material-symbols-outlined text-[24px]">person</span>
                        </a>
                    @endauth
                </div>
                <button id="mobile-menu-btn" class="md:hidden text-primary">
                    <span class="material-symbols-outlined text-[24px]">menu</span>
                </button>
            </div>
        </div>
        {{-- Mobile Menu --}}
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-outline-variant/10 px-6 py-4 space-y-4 font-headline font-semibold">
            <a href="{{ url('/') }}" class="block text-on-surface-variant">Home</a>
            <a href="{{ url('/about') }}" class="block text-on-surface-variant">About</a>
            <a href="{{ url('/contact') }}" class="block text-on-surface-variant">Support</a>
        </div>
    </nav>

    {{-- Main content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Component --}}
    <footer class="w-full py-16 px-6 md:px-12 bg-surface-container-lowest border-t border-outline-variant/10 font-body text-xs uppercase tracking-[0.05em]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 max-w-[1440px] mx-auto">
            <div class="flex flex-col gap-6">
                <div class="text-xl font-bold text-primary font-headline tracking-tighter">Dubai CCTV</div>
                <p class="text-on-surface-variant normal-case tracking-normal text-sm">Advanced Security Solutions. Protecting what matters most with innovative CCTV technology in Dubai and beyond.</p>
            </div>
            <div>
                <h4 class="font-headline font-bold text-on-surface mb-6 text-sm">Quick Links</h4>
                <ul class="space-y-4">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="{{ url('/about') }}">About Us</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="{{ url('/contact') }}">Product Support</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="#">Privacy Policy</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline font-bold text-on-surface mb-6 text-sm">Products</h4>
                <ul class="space-y-4">
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="#">Wireless Cameras</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="#">Outdoor Systems</a></li>
                    <li><a class="text-on-surface-variant hover:text-primary transition-colors normal-case tracking-normal text-sm" href="#">Smart Home Kits</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-headline font-bold text-on-surface mb-6 text-sm">Newsletter</h4>
                <p class="text-on-surface-variant normal-case tracking-normal mb-6 text-sm">Stay updated with the latest security innovations.</p>
                <div class="flex">
                    <input class="bg-surface-container-low border border-outline-variant/30 rounded-l-md py-3 px-4 w-full focus:outline-none focus:border-primary normal-case tracking-normal text-sm" placeholder="Email Address" type="email"/>
                    <button class="bg-primary text-on-primary px-5 py-3 rounded-r-md hover:bg-primary-container hover:text-on-primary-container transition-colors">
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="max-w-[1440px] mx-auto mt-16 pt-8 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <span class="text-on-surface-variant font-medium">© 2024 Dubai CCTV Security. Precision Security Systems.</span>
            <div class="flex gap-6">
                <a class="text-on-surface-variant hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">language</span></a>
            </div>
        </div>
    </footer>

    {{-- Floating WhatsApp Button --}}
    <a class="fixed bottom-8 right-8 z-50 bg-[#25D366] text-white p-4 rounded-full shadow-[0_10px_30px_rgba(37,211,102,0.4)] hover:scale-110 transition-transform duration-300 flex items-center justify-center" href="https://wa.me/9713354578910" target="_blank" aria-label="Chat on WhatsApp">
        <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">forum</span>
    </a>

    <script>
        // Mobile nav toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => menu.classList.toggle('hidden'));
        }
    </script>

    @stack('scripts')
</body>
</html>
