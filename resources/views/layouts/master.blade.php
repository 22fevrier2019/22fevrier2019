<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>22Fevrier2019</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    {{--<!-- Fonts -->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">--}}
    {{----}}
    {{--<!-- Icons -->--}}
    {{--<link href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">--}}

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    @yield('css')

    {{--<link type="text/css" href="{{asset('css/main.css')}}" rel="stylesheet">--}}
    {{----}}
    {{--<!-- Argon CSS -->--}}
    {{--<link type="text/css" href="{{asset('assets/css/argon.css')}}" rel="stylesheet">--}}

    <!-- Facebook OpenGraph -->
    <meta property="og:url" content="https://22fevrier2019.org/" />
    <meta property="fb:app_id" content="546361825856562" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="22 Fevrier 2019" />
    <meta property="og:description" content="A website for free Algerians" />
    <meta property="og:image" content="{{asset('assets/img/share.png')}}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="22 Fevrier 2019">
    <meta name="twitter:description" content="A website for free Algerians.">
    <meta name="twitter:image" content="{{asset('assets/img/share.png')}}">
    <meta name="twitter:domain" content="22fevrier2019.org">
    <!-- Hotjar Tracking Code for https://22fevrier2019.org/ -->

    {{--<script>--}}
        {{--(function(h,o,t,j,a,r){--}}
            {{--h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};--}}
            {{--h._hjSettings={hjid:1236816,hjsv:6};--}}
            {{--a=o.getElementsByTagName('head')[0];--}}
            {{--r=o.createElement('script');r.async=1;--}}
            {{--r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;--}}
            {{--a.appendChild(r);--}}
        {{--})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');--}}
    {{--</script>--}}

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136151161-1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136151161-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-136151161-1');
    </script>
</head>
<body>

<!--todo Header -->

<!--todo right side btns-->


@yield('content')


<!--todo Footer-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<!-- Custom js -->
@yield('js')

</body>
</html>