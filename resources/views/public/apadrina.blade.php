@extends('layouts.publicapp')
@section('content')
<header class="masthead" style="background-image: url('{{asset('/storage/app/public//')}}/{{$apadrina->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$apadrina->nom}}</div>
      <div class="col-lg-12 text-center">
        <div id="success"  class="col-lg-12 text-center">
            <a id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" href="{{asset('apadrina')}}/compra/{{$apadrina->id}}"><i class="fa fa-shopping-cart"> </i> Apadina'm</a>
        </div>
    </div>
  </div>
</header>
@include('public.components.shareSocial')
<section class="an" id="animals">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 portfolio-item">
        <div class="card-img">
          <!--<img src="{{asset('/storage/app/public/')}}/{{$apadrina->imatge}}" layout="responsive" width="auto" height="auto" alt="{{$apadrina->nom}}">-->
          <img src="{{asset('/storage/app/public/')}}/{{$apadrina->imatge}}" layout="responsive" width="auto" height="auto" alt="{{$apadrina->nom}}">
        </div>
      </div>
      <div class="col-md-6 col-sm-6 portfolio-item">
        <div class="intro-lead-in">
          <h1 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$apadrina->nom}}</h1>
          <h4 class="card-sub-title mbr-fonts-style align-center display-3">{{$apadrina->preu}}€</h4>
          <p>{{$apadrina->description}}</p> 
        </div>
      </div>
      <div class="col-md-12 col-sm-12 portfolio-item">
        <div id="success"  class="col-lg-12 text-center">
            <a id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" href="{{asset('apadrina')}}/compra/{{$apadrina->id}}"><i class="fa fa-shopping-cart"> </i> Apadina'm</a>
        </div>
          <h1 class="card-title mbr-fonts-style mbr-bold align-center display-5">Condicions</h1>
          <p>@isset($data){{$apadrina->ofereix}}@endisset</p>
        </div>
      </div>
  </div>
</section>
@include('public.families.families')
@include('public.especies.especies')
@include('public.colaboradors.colaboradors')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
  
</script>
@endsection