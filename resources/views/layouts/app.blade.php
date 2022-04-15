<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title itemprop="name">{{ $metaTitle ?? 'Learning Managment System' }}</title>

        <!-- Favicon -->
        <link href="{{ asset('public/admin/assets') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('public/admin/assets') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('public/admin/assets') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        @stack('css')

        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('public/admin/css') }}/argon.css?v=2.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @if (!in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock']))
                @include('layouts.navbars.sidebar')
            @endif
        @endauth

        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @if(!auth()->check() || in_array(request()->route()->getName(), ['welcome', 'page.pricing', 'page.lock']))
            @include('layouts.footers.guest')
        @endif
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/assets') }}/js/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('public/admin/assets') }}/vendor/js-cookie/js.cookie.js"></script>
        <script src="{{ asset('public/admin/assets') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('public/admin/assets') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
        <script src="{{ asset('public/admin/assets') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
        
        <!-- Optional JS -->
        <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('public/admin/assets') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        

        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('public/admin/assets') }}/js/argon.js?v=1.0.1"></script>
        <script src="{{ asset('public/admin/assets') }}/js/demo.min.js"></script>
    </body>
</html>
