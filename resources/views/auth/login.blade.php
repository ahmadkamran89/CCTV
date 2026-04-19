<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login – Dubai CCTV</title>
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
</head>
<body class="h-full bg-surface font-body flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <!-- Brand -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-primary rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-white text-3xl" style="font-variation-settings:'FILL' 1">security</span>
            </div>
            <h1 class="font-headline font-extrabold text-on-surface text-3xl">Dubai CCTV</h1>
            <p class="text-gray-500 mt-2 font-medium">Access Admin Control Panel</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-[2rem] border border-gray-100 shadow-xl shadow-gray-200/50 p-8 md:p-10">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-xl text-sm font-medium">
                    {{ $errors->first() }}
                </div>
                @endif

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Email Address</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">mail</span>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                               class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                      focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                      transition-all duration-200 text-sm font-medium"
                               placeholder="admin@dubaicctv.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2 tracking-tight">Password</label>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">lock</span>
                        <input type="password" id="password" name="password" required
                               class="w-full pl-12 pr-4 py-4 rounded-2xl border border-gray-100 bg-gray-50/50 
                                      focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary focus:bg-white
                                      transition-all duration-200 text-sm font-medium"
                               placeholder="••••••••">
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded-lg border-gray-300 text-primary focus:ring-primary transition-all">
                        <span class="text-sm text-gray-500 font-medium group-hover:text-gray-700 transition-colors">Remember me</span>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-primary hover:bg-primary-dark text-white font-headline font-bold py-4 rounded-2xl
                               shadow-lg shadow-primary/30 hover:shadow-primary/40 focus:ring-4 focus:ring-primary/20
                               transition-all duration-300 transform active:scale-[0.98]">
                    Sign In to Portal
                </button>
            </form>
        </div>

        <p class="text-center mt-8 text-gray-400 text-sm font-medium">
            &copy; {{ date('Y') }} Dubai CCTV Security Systems.
        </p>
    </div>

</body>
</html>
