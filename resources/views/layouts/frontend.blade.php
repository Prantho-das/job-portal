<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'BGEA Jobs')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">

    {{-- Header/Navigation --}}
    <nav id="main-header" class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="max-w-screen-xl px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <image src={{url("$site_logo")}} />
                </a>
                <div class="items-center hidden space-x-8 md:flex">
                    <a href="{{ url('/') }}" class="text-sm font-medium {{ request()->is('/') ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600">Home</a>
                    <a href="{{ url('/jobs') }}" class="text-sm font-medium {{ request()->is('jobs') ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600">Jobs</a>
                    <a href="{{ url('/companies') }}" class="text-sm font-medium {{ request()->is('companies') ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600">Companies</a>
                    <a href="{{ url('/build-cv') }}" class="text-sm font-medium {{ request()->is('build-cv') ? 'text-red-600' : 'text-gray-700' }} hover:text-red-600">Build Your CV</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="hidden sm:inline-block px-6 py-2.5 rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">Sign In</a>
                    <button class="p-2 text-gray-500 rounded-md md:hidden hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <main class="bg-[#f0eff5]">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer id="main-footer" class="bg-[#0b3c38]" aria-labelledby="footer-heading">
        <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:py-16 lg:px-8">
            <div class="pb-8 xl:grid xl:grid-cols-5 xl:gap-8">
                <div class="space-y-8 xl:col-span-2">
                    <div class="flex items-center space-x-3">
                       <svg class="w-auto h-8" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="32" height="32" rx="8" fill="#DC2626"/><text x="8" y="23" font-family="Inter, sans-serif" font-weight="bold" font-size="18" fill="white">B</text></svg>
                       <span class="text-xl font-bold text-white">BGEA Jobs</span>
                    </div>
                    <p class="max-w-xs text-base text-gray-300">
                        {{ $footerDescription }}
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-3">
                    <div class="col-span-2 md:grid md:grid-cols-3 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold tracking-wider text-gray-200 uppercase">Company</h3>
                            
                                {!! $footerCompanyLinks !!}
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold tracking-wider text-gray-200 uppercase">Developers</h3>
                                {!! $footerDevelopersLinks !!}
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="text-sm font-semibold tracking-wider text-gray-200 uppercase">Our communities</h3>
                                {!! $footerCommunitiesLinks !!}
                        </div>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold tracking-wider text-gray-200 uppercase">Contact</h3>
                        <ul class="mt-4 space-y-4">
                            <li class="flex items-center"><svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg><span class="ml-3 text-base text-gray-300">{{ $footerPhone }}</span></li>
                            <li class="flex items-center"><svg class="flex-shrink-0 w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg><span class="ml-3 text-base text-gray-300">{{ $footerEmail }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-8 mt-8 border-t border-gray-700 md:flex md:items-center md:justify-between">
                <div class="flex space-x-6 md:order-2">
                    <a href="{{ $footerInstagramUrl }}" class="text-gray-400 hover:text-white"><span class="sr-only">Instagram</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c-4.013 0-4.485.017-6.053.088C4.69 2.158 3.593 2.544 2.544 3.593c-1.05 1.05-1.436 2.147-1.506 3.714C.95 8.885.932 9.357.932 13.37c0 4.013.017 4.485.088 6.053.07 1.567.456 2.664 1.506 3.714 1.05 1.05 2.147 1.436 3.714 1.506 1.568.07 2.04.088 6.053.088s4.485-.017 6.053-.088c1.567-.07 2.664-.456 3.714-1.506 1.05-1.05 1.436-2.147 1.506-3.714.07-1.568.088-2.04.088-6.053s-.017-4.485-.088-6.053C23.05 5.309 22.664 4.21 21.614 3.16c-1.05-1.05-2.147-1.436-3.714-1.506C16.315 1.583 15.843 1.566 11.83 1.566zm0 2.163c3.949 0 4.38.016 5.915.085 1.4.063 2.22.342 2.88.99.66.66.927 1.48.99 2.88.07 1.535.085 1.966.085 5.915s-.016 4.38-.085 5.915c-.063 1.4-.342 2.22-.99 2.88-.66.66-1.48.927-2.88.99-1.535.07-1.966.085-5.915.085s-4.38-.016-5.915-.085c-1.4-.063-2.22-.342-2.88-.99-.66-.66-.927-1.48-.99-2.88-.07-1.535-.085-1.966-.085-5.915s.016-4.38.085-5.915c.063-1.4.342-2.22.99-2.88.66-.66 1.48.927 2.88-.99 1.535-.07 1.966-.085 5.915-.085z" clip-rule="evenodd" /><path d="M12 8.25a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5zM5.25 12a6.75 6.75 0 1113.5 0 6.75 6.75 0 01-13.5 0z" /><path d="M18.75 6.25a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /></svg></a>
                    <a href="{{ $footerTwitterUrl }}" class="text-gray-400 hover:text-white"><span class="sr-only">Twitter</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg></a>
                    <a href="{{ $footerLinkedinUrl }}" class="text-gray-400 hover:text-white"><span class="sr-only">LinkedIn</span><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg></a>
                </div>
                <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">{!! $footerCopyrightText !!}</p>
            </div>
        </div>
    </footer>

</body>
</html>
