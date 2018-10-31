@extends('layouts.publicapp')
@section('content')
<header class="masthead" @if(sizeof($families) > 0) style="background-image: url('{{asset('/storage/app/public//')}}/{{$families[rand(0,sizeof($families)-1)]->imatge}}');" @endif >
  <div class="container">
    <div class="intro-text" >
      <div class="intro-text-sombra">
        <div class="intro-heading">Benvinguts a {{$administra->titol}}</div>
        <div class="intro-lead-in">{{$administra->description}}</div>
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
