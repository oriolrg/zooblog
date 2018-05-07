@extends('layouts.publicapp')
@section('content')
  <header class="masthead" style="background-image: url('{{asset('public/storage/')}}/{{$data[rand(0,sizeof($data)-1)]->imatge}}');">
    <div class="container">
      <div class="intro-text" >
        <div class="intro-text-sombra">
        <!-- TODO text corresponent a la plana on s'està -->
          <div class="intro-heading">Benvinguts a {{ config('app.name') }}!</div>
          <!-- TODO insertar descripció blog i comentaris -->
          <div class="intro-lead-in">Falta petita descripció del blog</div>
        </div>
      </div>
    </div>
  </header>
  <!-- Services -->
  <section class="bg-light"  id="categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Categories d'animals</h2>
        </div>
      </div>
      <div class="row">
        @foreach($data as $key => $categoria)
          @if ($categoria->status === 1)
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link"  href="{{asset('categoria')}}/{{$categoria->title}}">
              <div class="portfolio-hover">
                  <img class="img-fluid" src="{{asset('public/storage/')}}/{{$categoria->imatge}}" alt="">

              </div>
              <img class="rounded-circle img-fluid" src="{{asset('public/storage/')}}/{{$categoria->imatge}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{ $categoria->title}}</h4>
              <p class="text-muted">{{ $categoria->description}}</p>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>
        @include('public.animals.animals')
        @include('public.quisom.quisom')
        @include('public.colaboradors.colaboradors')
        @include('public.contacta.contacta')
        @include('public.footer.footer')
@endsection
