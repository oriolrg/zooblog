@extends('layouts.publicapp')
@section('content')
<header class="masthead" style="background-image: url('{{asset('/storage/app/public//')}}/{{$data->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$data->title}}</div>
      <!-- TODO insertar descripció blog i comentaris -->
      <div class="intro-lead-in">{{$data->description}}</div>
    </div>
  </div>
</header>

  <!-- Services -->
  <section id="animals">
    <div class="container">
      <div class="row text-center">
        @foreach($data->animals as $key => $animals)
          @if ($animals->status === 1)
          <div class="col">
            <a href="{{asset('categoria')}}/{{$data->title}}/{{$animals->title}}">
              <span class="fa-stack fa-4x">
                <img class="rounded-circle img-fluid" src="{{asset('/storage/app/public//')}}/{{$animals->imatge}}" alt="">
              </span>
              <h4 class="service-heading">{{ $animals->title}}</h4>
              <h6>{{ $animals->nomcientific }}</h6>
            </a>
            <ul  class="text-muted">
              <li>
                Ocurrència: {{ $animals->ocurrencia }}
              </li>
              <li>
                Mida: {{ $animals->mida }}
              </li>
              <li>
                Pes: {{ $animals->pes }}
              </li>
              <li>
                Embaras: {{ $animals->embaras }}
              </li>
              <li>
                Nº de cries: {{ $animals->cries }}
              </li>
              <li>
                Vida: {{ $animals->vida }}
              </li>
              <li>
                Dieta: {{ $animals->dieta }}
              </li>
              <li>
                Estatus de protecció: {{ $animals->proteccio }}
              </li>
            </ul>
            <p>{{ $animals->description}}</p>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>

  @include('public.colaboradors.colaboradors')
  @include('public.contacta.contacta')
  @include('public.footer.footer')
  @include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
