<!-- Navigation navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav"-->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand js-scroll-trigger" href="{{asset('/')}}">{{$administra->titol}}</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
        <ul class="navbar-nav mx-auto text-md-center text-left">
             <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#families">Families d'animals</a>
        </li>
        <!--<li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#animals">Animals</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#apadrina">Apadrina</a>
        </li>-->
        <li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#especies">Especies d'animals</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#apadrina">Apadrina'ns</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#colaboradors">Col·laboradors</a>
        </li>
        <li class="nav-item">
        	<a class="nav-link js-scroll-trigger" href="#contact">Contacta</a>
        </li>
        <li class="nav-item">
          <a class="portfolio-link nav-link " data-toggle="modal" href="#politicaPrivacitat">Politica de Privacitat</a>
        </li>
        </ul>
        <ul class="nav navbar-nav flex-row justify-content-md-center justify-content-start flex-nowrap">
            <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/ca">CA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/es">ES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{asset('/')}}idioma/en">EN</a>
        </li>
        </ul>
    </div>
</nav>


