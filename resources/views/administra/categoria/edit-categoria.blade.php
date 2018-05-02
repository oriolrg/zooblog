	@extends('layouts.app')



@section('content')
@include('administra.menu.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edita categoria</div>

                <div class="panel-body">

								@if(isset($editdata))
									<form  enctype="multipart/form-data"  action="{{ url('/administra/categoria/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
										 {{ method_field('PUT') }}
										 {{ csrf_field() }}
										<input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
										 

										<label for="title">Nom</label>
			                            <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}">
			                            <label for="description">Descripció</label>
			                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($editdata) {{$editdata->description}} @endisset</textarea>
			                            <legend>Imatge</legend>
			                            @include('administra.uploadimage.uploadimage1')
			                            <label for="title">Publicar?</label>
			                            <select name="status" id="status" class="form-control">
			                                <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
			                                <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
			                            </select>
			                            <button type="submit" class="btn btn-primary" >
			                                    <i class="glyphicon glyphicon-send"> Enviar </i>
			                                </button>
			                    </form>
									
									@endisset
				</div>
			</div>
		</div>
	</div>
</div>

@stop
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection