@extends('layouts.administraapp')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administra la plataforma de Pagament</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="catala"><a href="#">Català</a></li>
                    <li id="castella"><a href="#">Castellà</a></li>
                    <li id="angles"><a href="#">Anglès</a></li>
                  </ul>
                </div>
                <div id="formCatala">
							<form  enctype="multipart/form-data"  action="{{ url('administra/plataformaPagament/1/edit')}}" method="PUT">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<input type="hidden" name="post_id" value="{{isset($dataAdministra) ? $dataAdministra->id : ''}}">
								@include('administra.plataformaPagament.formulari')
							</form>
					</div>
                <div id="formCastella">
                    <form  enctype="multipart/form-data"  action="{{ url('ES/administra/plataformaPagament/1/edit') }}" method="PUT">
                        {{ csrf_field() }}
                        @if(isset($dataAdministra))
                            <input type="hidden" name="post_id" value="{{isset($dataAdministra) ? $dataAdministra->id : ''}}">
                            @include('administra.plataformaPagament.formulari_ES')
                        @endif
                    </form>
                </div>
                <div id="formAngles">
                    <form  enctype="multipart/form-data"  action="{{ url('EN/administra/plataformaPagament/1/edit') }}" method="PUT">
                        {{ csrf_field() }}
                        @if(isset($dataAdministra))
                            <input type="hidden" name="post_id" value="{{isset($dataAdministra) ? $dataAdministra->id : ''}}">
                            @include('administra.plataformaPagament.formulari_EN')
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
