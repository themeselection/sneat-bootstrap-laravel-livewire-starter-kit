<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />


@props([
    'pageTitle',
])


<title>@yield('title') |
  {{ config('variables.templateName') ? config('variables.templateName') : 'TemplateName' }} -
  {{ config('variables.templateSuffix') ? config('variables.templateSuffix') : 'TemplateSuffix' }}
</title>

<meta name="description" content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
<meta name="keywords" content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
<!-- laravel CRUD token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Canonical SEO -->
<meta property="og:title" content="{{ config('variables.templateName') ? config('variables.templateName') : '' }}{{ config('variables.ogTitle') ? config('variables.ogTitle') : '' }}" />
<meta property="og:type" content="{{ config('variables.ogType') ? config('variables.ogType') : '' }}" />
<meta property="og:url" content="{{ config('variables.productPage') ? config('variables.productPage') : '' }}" />
<meta property="og:image" content="{{ config('variables.ogImage') ? config('variables.ogImage') : '' }}" />
<meta property="og:description" content="{{ config('variables.templateName') ? config('variables.templateName') : '' }}{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
<meta property="og:site_name" content="{{ config('variables.creatorName') ? config('variables.creatorName') : '' }}" />
<link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>


<!-- Include Styles -->
@include('partials.styles')

@livewireStyles
