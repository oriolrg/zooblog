@extends('layouts.publicapp')
@section('content')
<header class="masthead" @if(sizeof($header) > 0) style="background-image: url('{{asset('/storage/app/public//')}}/{{$header->imatge}}');" @endif >
  <div class="container">
    <div class="intro-text" >
      <div class="intro-text-sombra">
        <div class="intro-heading">@if(isset($administra)) {{$administra->titol}} @endisset</div>
        <div class="intro-lead-in">@if(isset($administra)) {{$administra->description}} @endisset</div>
      </div>
    </div>
</div>
</header>
@include('public.components.shareSocial')
@include('public.families.families')
@include('public.especies.especies')
@include('public.apadrina.apadrina')
@include('public.colaboradors.colaboradors')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
