@php
    use Illuminate\Support\Facades\View;
    $siteName = 'Karakorum Crown Expeditions';
    $currentUrl = url()->current();
    
    // Set values from variables or view sections
    $pageTitle = View::hasSection('title') ? trim(View::getSection('title')) : ($title ?? null);
    $seoTitle = $seoTitle ?? ($pageTitle ?? 'Top Karakorum Treks & K2 Expeditions in Pakistan');
    if (!str_contains($seoTitle, $siteName)) {
        $seoTitle = $seoTitle . ' | ' . $siteName;
    }
    
    $pageDesc = View::hasSection('meta_description') ? trim(View::getSection('meta_description')) : ($metaDescription ?? null);
    $seoDescription = $seoDescription ?? ($pageDesc ?? 'Licensed tour operator in Skardu, Pakistan offering guided K2 Base Camp, Gondogoro La, Snow Lake, and cultural expeditions across Gilgit-Baltistan.');
    
    $pageImage = View::hasSection('og_image') ? trim(View::getSection('og_image')) : ($ogImage ?? null);
    $seoImage = $seoImage ?? ($pageImage ?? asset('assets/Front-banner-k2.webp'));
    $seoType = $seoType ?? 'website';
    $seoAuthor = 'Karakorum Crown Expeditions';
@endphp

<!-- Basic Meta Tags -->
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="author" content="{{ $seoAuthor }}">
<link rel="canonical" href="{{ $currentUrl }}">
@if(View::hasSection('meta_robots'))
<meta name="robots" content="@yield('meta_robots')">
@elseif(isset($metaRobots))
<meta name="robots" content="{{ $metaRobots }}">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $seoType }}">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:image" content="{{ $seoImage }}">
<meta property="og:site_name" content="{{ $siteName }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ $currentUrl }}">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $seoImage }}">

<!-- Organization JSON-LD -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "TravelAgency",
  "name": "{{ $siteName }}",
  "url": "{{ config('app.url') }}",
  "logo": "{{ asset('assets/karakorum-logo.png') }}",
  "description": "Licensed mountain tour operator in Skardu, Pakistan offering certified guided treks, K2 expeditions, and cultural tours in Gilgit-Baltistan.",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Satpara Road, Zhye Thang 1, Near Hispar Hotel",
    "addressLocality": "Skardu",
    "addressRegion": "Gilgit-Baltistan",
    "postalCode": "16100",
    "addressCountry": "PK"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+923425343629",
    "contactType": "customer service"
  }
}
</script>

@if(isset($schemaJson))
<!-- Page Specific JSON-LD -->
<script type="application/ld+json">
{!! $schemaJson !!}
</script>
@endif
