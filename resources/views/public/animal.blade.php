@extends('layouts.publicapp')
@section('content')

<!-- Navigation -->
<header class="masthead" style="background-image: url('{{asset('public/storage/')}}/{{$animal->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$animal->title}}</div>
      <!-- TODO insertar descripció  i comentaris -->
      <div class="intro-lead-in">{{$animal->description}}</div>
    </div>
  </div>
</header>

    <?php $cont = 0 ?>
	@foreach($animal->seccions as $key => $seccions)
	<?php $cont += 1 ?>
    @if(@isset($seccions->imatge))
    <article class="@if($cont %2 == 0) bg-gray @endif">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 @if($cont %2 == 0) order-lg-2 @endif">
            <div class="p-5">
              <img class="img-fluid rounded-circle" src="{{asset('public/storage/')}}/{{$seccions->imatge}}" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1">
            <div class="p-5">
	            <legend>{{$seccions->title}}</legend>
	                <p>
	                    {{$seccions->description}}
	                </p>
	                {{$seccions->list}}
            </div>
          </div>
        </div>
      </div>
      </article>
      @else
      <article class="@if($cont %2 == 0) bg-gray @endif">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 order-lg-1">
            <div class="p-5">
              <legend>{{$seccions->title}}</legend>
                  <p>
                      {{$seccions->description}}
                  </p>
                  {{$seccions->list}}
            </div>
          </div>
        </div>
      </div>
      </article>
      @endif
      @endforeach
      @include('public.contacta.contacta')
      @include('public.footer.footer')


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@endsection
