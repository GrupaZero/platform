<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('seoDescription', option('general', 'site_desc'))">
<meta name="version" content="{{ config('gzero.app_version') }}">

<title>@yield('title', option('general', 'site_name'))</title>
@yield('metaData')

<script>
    window.Laravel = @json(['csrfToken' => csrf_token()]);
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
@yield('head')
@stack('head')
