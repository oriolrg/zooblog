	@extends('layouts.app')



@section('content')
@include('administra.menu.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edita Animal</div>

                <div class="panel-body">

								@if(isset($animal))
									<form action="{{ url('/administra/animal/') }}/{{isset($animal) ? $animal->id : ''}}" method="POST">
										 {{ method_field('PUT') }}
										 {{ csrf_field() }}
										<input type="hidden" name="post_id" value="{{isset($animal) ? $animal->id : ''}}">
										 

										 <label for="title">Nom</label>
												 <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($animal) ? $animal->title : ''}}">
										 <label for="description">Descripció</label>
												 <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($animal) {{$animal->description}} @endisset</textarea>
										<label for="description">Imatge</label>
		 								   	 <textarea type="file" name="imatge" id="imatge" class="form-control" placeholder="Imatge..." rows="7">@isset($animal) {{$animal->description}} @endisset</textarea>
										 <label for="title">Publicar?</label>
												 <select name="status" id="status" class="form-control">
														 <option value="0" @isset($animal) @if($animal->status == 0) selected @endif @endisset>NO</option>
														 <option value="1" @isset($animal) @if($animal->status == 1) selected @endif @endisset>SI</option>
												 </select>
										 <input type="submit" class="btn btn-success" value="Guardar">
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