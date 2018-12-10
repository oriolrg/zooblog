@extends('layouts.publicappcarret')
@section('content')
<section style="background-image: url('@isset($apadrina->imatge){{asset('/storage/app/public//')}}/{{$apadrina->imatge}}@endisset');">

</section>
@include('public.carret.compra')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
