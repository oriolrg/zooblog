<!-- Navigation navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav"-->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top compra" id="mainNav">
    <a class="navbar-brand js-scroll-trigger" href="{{asset('/')}}">@isset($administra){{$administra->titol}}@endisset</a>
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between" id="collapsingNavbar2" role="navigation">
        <ul class="navbar-nav mx-auto text-md-center text-left">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}#families">@isset($administra){{$administra->menu1}}@endisset</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}#especies">@isset($administra){{$administra->menu2}}@endisset</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}#apadrina">@isset($administra){{$administra->menu3}}@endisset</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}#colaboradors">@isset($administra){{$administra->menu4}}@endisset</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}#contact">@isset($administra){{$administra->menu5}}@endisset</a>
            </li>
            <li class="nav-item">
              <a class="portfolio-link nav-link " data-toggle="modal" href="{{asset('/')}}#politicaPrivacitat">@isset($administra){{$administra->menu6}}@endisset</a>
            </li>
            </ul>
            <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
                <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/ca">CA</a>
            </li>
            <li class="nav-item">
              <span class="nav-link js-scroll-trigger">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/es">ES</a>
            </li>
            <li class="nav-item">
              <span class="nav-link js-scroll-trigger">|</span>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/en">EN</a>
            </li>
        </ul>
    </div>
</nav>


