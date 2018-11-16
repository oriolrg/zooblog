	@extends('layouts.administraapp')



@section('content')
@include('administra.menu.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/administra/apadrina/') }}" style="text-decoration:none; "><i class="hidden-xl" style="font-size:large;">←</i></a> Edita {{$editdata->title}}</div>

                <div class="panel-body">
					<div>
						<ul class="nav nav-tabs">
							<li class="llistarCategoria" id="catala"><a href="#">Català</a></li>
							<li id="castella"><a href="#">Castellà</a></li>
							<li id="angles"><a href="#">Anglès</a></li>
						</ul>
					</div>
					<div id="formCatala">
						@if(isset($editdata))
							<form  enctype="multipart/form-data"  action="{{ url('/administra/apadrina/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								@if(isset($editdata))
									<input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
								@endif
								@include('administra.apadrina.formulari')
							</form>
						@endisset
					</div>
					<div id="formCastella">
						@if(isset($editdata))
							<form  enctype="multipart/form-data"  action="{{ url('ES/administra/apadrina/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								@if(isset($editdata))
									<input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
								@endif
								@include('administra.apadrina.formulari_ES')
							</form>
						@endisset
					</div>
					<div id="formAngles">
						@if(isset($editdata))
							<form  enctype="multipart/form-data"  action="{{ url('EN/administra/apadrina/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								@if(isset($editdata))
									<input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
								@endif
								@include('administra.apadrina.formulari_EN')
							</form>
						@endisset
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
