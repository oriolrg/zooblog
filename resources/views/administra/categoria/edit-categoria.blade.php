	@extends('layouts.app')



@section('content')
@include('administra.menu.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/administra/categoria/') }}" style="text-decoration:none; "><i class="hidden-xl" style="font-size:large;">←</i></a> Edita {{$editdata->title}}</div>

                <div class="panel-body">

								@if(isset($editdata))
									<form  enctype="multipart/form-data"  action="{{ url('/administra/categoria/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
										 {{ method_field('PUT') }}
										 {{ csrf_field() }}
										<input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
										@include('administra.categoria.formulari')
									@endisset
									</form>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
