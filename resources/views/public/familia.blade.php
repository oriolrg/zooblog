@extends('layouts.publicfamilia')
@section('content')
<header class="masthead" style="background-image: url('{{asset('/storage/app/public//')}}/{{$data->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$data->title}}</div>
      <h1> {{$data->nomcientific}}</h1>
    </div>
  </div>
</header>
@include('public.components.shareSocial')
  <!-- Services -->
  <section id="especia">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">@isset($data){{$data->title}}@endisset</h2>
          <h6 class="section-heading text-uppercase">@isset($data){{$data->nomcientific}}@endisset</h6>
        </div>
      </div>
    <!-- TODO insertar descripció blog i comentaris -->
      <div class="intro-lead-in">{{$data->description}}</div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <h3 class="section-heading text-uppercase"></h3>
          </div>
        </div>
        <div class="row">
          @foreach($data->animals as $key => $animals)
            @if ($animals->status === 1)
              <a  class="portfolio-link" href="{{asset('familia')}}/{{$data->title}}/{{$animals->title}}">
                <div class="col-md-3 col-sm-6 portfolio-item">
                  <div class="portfolio-hover">
                    <img class="img-fluid" src="{{asset('/storage/app/public//')}}/{{$animals->imatge}}" alt="{{$animals->alt_imatge}}">
                  </div>
                  <img class="rounded-circle img-fluid" src="{{asset('/storage/app/public//')}}/{{$animals->imatge}}" alt="{{$animals->alt_imatge}}"> 
                  <a class="portfolio-link"  href="{{asset('familia')}}/{{$data->title}}/{{$animals->title}}">
                    <div class="portfolio-caption">
                      <h4 class="">{{ $animals->title}}</h4>
                      <h6 class="">{{ $animals->nomcientific }}</h6>
                      <p class="">{{substr($animals->description,0,100)}}<a  class="portfolio-link" href="{{asset('familia')}}/{{$data->title}}/{{$animals->title}}" style="color:green">...</a></p>
                    </div>
                  </a>
                  </div>
                </a>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('public.apadrina.apadrina')
  @include('public.families.families')
  @include('public.colaboradors.colaboradors')
  @include('public.contacta.contacta')
  @include('public.footer.footer')
  @include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
