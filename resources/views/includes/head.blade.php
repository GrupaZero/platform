<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="@yield('seoDescription', option('general', 'site_desc'))">
<title>@yield('title', option('general', 'site_name'))</title>
@yield('metaData')

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>

</script>

@if(option('seo', 'google_analytics_id') && env('APP_ENV') === 'production')
<!-- Google Analytics web tracking code -->
<script type="text/javascript">
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{ option('seo', 'google_analytics_id') }}', 'auto');
    ga('require', 'eventTracker');
    ga('require', 'displayfeatures');
    @yield('gaPlugin')
    @if(!$user->isGuest())
    ga('set', 'userId', 'gz-user-{{ $user->id }}');
    @endif
    ga('send', 'pageview');
    @yield('gaEvent')
</script>
<script async src="{{ asset('/js/autotrack.js') }}"></script>
<!-- end Google Analytics web tracking code-->
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
    <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@show
