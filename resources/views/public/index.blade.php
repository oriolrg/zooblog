@extends('layouts.publicapp')
@section('content')
<header class="masthead" @if(sizeof($families) > 0) style="background-image: url('{{asset('/storage/app/public//')}}/{{$families[rand(0,sizeof($families)-1)]->imatge}}');" @endif >
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
@include('public.families.families')
@include('public.especies.especies')
@include('public.apadrina.apadrina')
@include('public.colaboradors.colaboradors')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
