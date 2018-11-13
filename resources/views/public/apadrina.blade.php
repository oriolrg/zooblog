@extends('layouts.publicapp')
@section('content')
<header class="masthead" style="background-image: url('{{asset('/storage/app/public//')}}/{{$apadrina->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$apadrina->nom}}</div>
    </div>
  </div>
</header>
<section class="an" id="animals">
  <div class="container">
    <div class="intro-lead-in">
      
        <div class="col">
          <!--<a  class="portfolio-link" href="{{asset('familia')}}/especie/{{$apadrina->title}}">-->
            <div class="card-wrapper">
              <div class="card-img">
                <img src="{{asset('/storage/app/public/')}}/{{$apadrina->imatge}}" layout="responsive" width="20%" height="20%" alt="{{$apadrina->alt_imatge}}">
              </div>
              <div class="card-box">
                <h1 class="card-sub-title mbr-fonts-style align-center display-3">{{$apadrina->nom}}</h1>
                <h4 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$apadrina->preu}}€</h4>
                
                <p class="mbr-text mbr-fonts-style align-center display-7">{{$apadrina->description}}</p>
              </div>
            </div>
          </a>
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