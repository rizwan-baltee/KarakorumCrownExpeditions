@php
    $siteName = 'Karakorum Crown Expeditions';
    $currentUrl = url()->current();
    
    // Set default values if not provided
    $seoTitle = $seoTitle ?? ($title ?? 'Top Karakorum Treks & K2 Expeditions');
    if (!str_contains($seoTitle, $siteName)) {
        $seoTitle = $seoTitle . ' | ' . $siteName;
    }
    
    $seoDescription = $seoDescription ?? 'Karakorum Crown Expeditions offers the best premium guided treks, K2 expeditions, and cultural tours in Gilgit-Baltistan and Northern Pakistan.';
    $seoImage = $seoImage ?? asset('frontend/images/k2-hero.webp');
    $seoType = $seoType ?? 'website';
    $seoAuthor = 'Karakorum Crown Expeditions';
@endphp

<!-- Basic Meta Tags -->
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="author" content="{{ $seoAuthor }}">
<link rel="canonical" href="{{ $currentUrl }}">

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
  "logo": "{{ asset('frontend/images/logo.png') }}",
  "description": "Premium guided treks, K2 expeditions, and cultural tours in Gilgit-Baltistan and Northern Pakistan.",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "Skardu, Gilgit-Baltistan",
    "addressLocality": "Skardu",
    "addressRegion": "GB",
    "postalCode": "16100",
    "addressCountry": "PK"
  },
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+923000000000",
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
