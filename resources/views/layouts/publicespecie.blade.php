<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="{{$administra->titol}}">
    <meta name="description" content="{{$administra->description}}">
    <meta name="keywords" content="{{$administra->llista}}">
    <meta name="author" content="TecnoLord: Oriol Riu Gispert">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112874394-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-112874394-1');
    </script>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Custom fonts for this template -->
    <link href="{{ asset('/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/agency.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/agency.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">


        <title>{{$administra->titol}} - Especies - {{$especie->title}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- cookies -->
      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
      <script>
              window.addEventListener("load", function(){
              window.cookieconsent.initialise({
                "palette": {
                  "popup": {
                    "background": "#000"
                  },
                  "button": {
                    "background": "#f1d600"
                  }
                },
                "content": {
                  "message": "Aquest lloc web utilitza galetes per assegurar-vos que obtingueu la millor experiència al nostre lloc web. Aprèn més",
                  "dismiss": "Accepta",
                  "link": "Política de Cookies",
                  "href": "politica"
                }
              })});
      </script>

    </head>
    <body>
    <div id="page-top"></div>
        @include('public.navbar.navbar')
        @yield('content')
        @yield('js')
        <!-- Bootstrap core JavaScript
        <script src="{{ asset('public/js/bootstrap.js') }}" type="text/javascript"></script>-->
        <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Plugin JavaScript -->
        <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Contact form JavaScript -->
        <script src="{{ asset('/js/jqBootstrapValidation.js') }}"></script>
        <script src="{{ asset('/js/contact_me.js') }}"></script>

        <!-- Custom scripts for this template -->
        <script src="{{ asset('/js/agency.min.js') }}"></script>
        <!-- Generic functions -->
        <script src="{{ asset('/js/funcions.js') }}"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </body>
</html>
