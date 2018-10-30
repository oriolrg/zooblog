@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administra el blog i SEO</div>

                <div class="panel-body">
                
                <form  enctype="multipart/form-data"  action="{{ url('administra/administra/edit') }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    @if(isset($dataAdministra))
                        <input type="hidden" name="post_id" value="{{isset($dataAdministra) ? $dataAdministra[0]->id : ''}}">
                    @endif
                    @include('administra.administra.formulari')
                </form>
                
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
