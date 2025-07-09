<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Amril Azim - Full Stack Developer') }}</title>
    <meta name="description" content="Amril Azim - Full Stack Developer specializing in Laravel, Vue.js, and modern web applications. Building scalable solutions with clean code and exceptional user experiences.">
    <meta name="keywords" content="Laravel Developer, Vue.js Developer, Full Stack Developer, PHP Developer, Malaysia, Web Development, Inertia.js, Tailwind CSS">
    <meta name="author" content="Amril Azim">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Amril Azim - Full Stack Developer">
    <meta property="og:description" content="Full Stack Developer specializing in Laravel, Vue.js, and modern web applications. Building scalable solutions with clean code and exceptional user experiences.">
    <meta property="og:image" content="{{ asset('img/hero.jpeg') }}">
    <meta property="og:site_name" content="Amril Azim Portfolio">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Amril Azim - Full Stack Developer">
    <meta property="twitter:description" content="Full Stack Developer specializing in Laravel, Vue.js, and modern web applications.">
    <meta property="twitter:image" content="{{ asset('img/hero.jpeg') }}">
    
    <!-- Performance optimizations -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="dns-prefetch" href="//www.google-analytics.com">
    
    <!-- Preload critical resources -->
    <link rel="preload" href="{{ asset('img/hero.jpeg') }}" as="image" type="image/jpeg" fetchpriority="high">
    <link rel="preload" href="{{ asset('css/app.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/app.js') }}" as="script">
    
    <!-- Resource hints for external services -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/logo.png') }}">
    
    <!-- Web App Manifest -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    
    <!-- Additional performance meta tags -->
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#3b82f6">
    
    <!-- Additional Lighthouse optimizations -->
    <meta name="color-scheme" content="light dark">
    <meta name="supported-color-schemes" content="light dark">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Amril Azim">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500&display=swap"
        rel="stylesheet">
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-XXXXXXXXXX', {
            page_title: document.title,
            page_location: window.location.href,
        });
    </script>

    <!-- Scripts -->
    @routes
    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia
</body>

</html>
