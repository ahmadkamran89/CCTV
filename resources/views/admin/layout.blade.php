<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') – Dubai CCTV</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#476459',
                        'primary-dark': '#344d43',
                        'primary-light': '#c0e1d2',
                        surface: '#fcfaee',
                        'on-surface': '#1b1c15',
                    },
                    fontFamily: {
                        headline: ['Plus Jakarta Sans', 'sans-serif'],
                        body: ['Manrope', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    @stack('styles')
</head>
<body class="h-full bg-gray-50 font-body">

<div class="flex h-full min-h-screen">

    {{-- ═══════════════ SIDEBAR ══════════════════ --}}
    <aside class="w-64 bg-[#1b1c15] text-white flex flex-col flex-shrink-0">
        {{-- Brand --}}
        <div class="px-6 py-6 border-b border-white/10">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-primary rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-lg" style="font-variation-settings:'FILL' 1">security</span>
                </div>
                <div>
                    <div class="font-headline font-bold text-white text-base leading-none">Dubai CCTV</div>
                    <div class="text-white/40 text-xs mt-0.5 font-body">Admin Panel</div>
                </div>
            </a>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-3 py-6 space-y-1">
            <p class="px-3 mb-3 text-white/30 text-xs font-semibold uppercase tracking-widest">Manage</p>
            <a href="{{ route('admin.products.index') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.products.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-colors">
                <span class="material-symbols-outlined text-lg">inventory_2</span>
                Products
            </a>

            <a href="{{ route('admin.categories.index') }}" 
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium {{ request()->routeIs('admin.categories.*') ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/10 hover:text-white' }} transition-colors">
                <span class="material-symbols-outlined text-lg">category</span>
                Categories
            </a>
            <a href="{{ route('admin.products.create') }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors text-white/60 hover:bg-white/10 hover:text-white">
                <span class="material-symbols-outlined text-lg" style="font-variation-settings:'FILL' 1">add_box</span>
                Add Product
            </a>

            <div class="my-4 border-t border-white/10"></div>

            <p class="px-3 mb-3 text-white/30 text-xs font-semibold uppercase tracking-widest">Site</p>
            <a href="{{ url('/') }}" target="_blank"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/60 hover:bg-white/10 hover:text-white transition-colors">
                <span class="material-symbols-outlined text-lg">open_in_new</span>
                View Store
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit"
                   class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-red-400 hover:bg-red-400/10 transition-colors">
                    <span class="material-symbols-outlined text-lg">logout</span>
                    Logout
                </button>
            </form>
        </nav>

        {{-- Footer --}}
        <div class="px-6 py-4 border-t border-white/10">
            <p class="text-white/30 text-xs">© 2024 Dubai CCTV</p>
        </div>
    </aside>

    {{-- ═══════════════ MAIN ══════════════════════ --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Top bar --}}
        <header class="bg-white border-b border-gray-200 px-8 py-4 flex items-center justify-between">
            <div>
                <h1 class="font-headline font-bold text-on-surface text-lg">@yield('page-title', 'Dashboard')</h1>
                <p class="text-gray-500 text-sm mt-0.5">@yield('page-subtitle', '')</p>
            </div>
            <div class="flex items-center gap-3">
                @yield('header-actions')
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="mx-8 mt-6 bg-green-50 border border-green-200 text-green-800 rounded-xl px-5 py-4 flex items-center gap-3">
            <span class="material-symbols-outlined text-green-500" style="font-variation-settings:'FILL' 1">check_circle</span>
            <span class="font-body text-sm font-medium">{{ session('success') }}</span>
        </div>
        @endif

        @if(session('error') || $errors->any())
        <div class="mx-8 mt-6 bg-red-50 border border-red-200 text-red-800 rounded-xl px-5 py-4 flex items-start gap-3">
            <span class="material-symbols-outlined text-red-500 mt-0.5" style="font-variation-settings:'FILL' 1">error</span>
            <div class="font-body text-sm">
                @if(session('error'))
                    <p class="font-medium">{{ session('error') }}</p>
                @endif
                @if($errors->any())
                    <ul class="list-disc list-inside space-y-1 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @endif

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
