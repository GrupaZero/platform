<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('seoDescription', option('general', 'site_desc'))">
<meta name="version" content="{{ config('gzero.app_version') }}">

<title>@yield('title', option('general', 'site_name'))</title>
@yield('metaData')

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>

</script>

@if(option('seo', 'google_tag_manager_id') && env('APP_ENV') === 'production')
    <script>
        dataLayer = [];
        @if(!$user->isGuest())
        dataLayer.push({'userId': '{{ $user->id }}'});
        @endif
        @yield('dataLayer')
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer', '{{ option('seo', 'google_tag_manager_id') }}');</script>
    <!-- End Google Tag Manager -->
@endif

<script type="application/ld+json">
[
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "{{ config('app.name') }}",
      "url": "{{ route('home') }}"
    },
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "{{ route('home') }}",
      "logo": "{{ asset('/images/logo.png') }}"
    }
]
</script>
@section('head')
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@show
