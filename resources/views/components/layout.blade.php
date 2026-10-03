@props([
    'title' => 'OMF <code/> Développement, IA & Formation pour tous',
    'description' => 'Studio tech basé en Afrique. Nous concevons sites, apps, agents IA et formons vos équipes à l\'ère numérique.',
    'ogType' => 'website',
    'ogImage' => null,
    'schema' => null,
])
<!doctype html>
<html lang="fr" class="dark">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}"/>
    <link rel="canonical" href="{{ url()->current() }}"/>
    <meta name="theme-color" content="#0b1020"/>
    <link rel="icon" href="{{ asset('favicon.ico') }}"/>

    {{-- Open Graph --}}
    <meta property="og:site_name" content="OMF code"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta property="og:type" content="{{ $ogType }}"/>
    <meta property="og:title" content="{{ $title }}"/>
    <meta property="og:description" content="{{ $description }}"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:image" content="{{ $ogImage ?? asset('images/hero.png') }}"/>

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="{{ $title }}"/>
    <meta name="twitter:description" content="{{ $description }}"/>
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/hero.png') }}"/>

    @if ($schema)
    <script type="application/ld+json">{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
    @endif
    
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@500;600;700;800&display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config={darkMode:'class'}</script>
    
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    
    <!-- Injection du Header via site.js -->
    <div id="siteHeader"></div>

    <main>
        {{ $slot }}
    </main>

    <!-- Injection du Footer via site.js -->
    <div id="siteFooter"></div>

    <!-- Script complet du template pour garantir le fonctionnement exact (mobile, dropdown, animations) -->
    <script src="{{ asset('assets/js/site.js') }}"></script>
    
</body>
</html>
