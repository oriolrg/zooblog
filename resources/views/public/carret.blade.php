@extends('layouts.publicappcarret')
@section('content')
<section style="background-image: url('{{asset('/storage/app/public//')}}/{{$apadrina->imatge}}');">

</section>
@include('public.carret.compra')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')
@endsection
