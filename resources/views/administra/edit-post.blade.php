	@extends('layouts.app')



@section('content')
@include('administra.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edita categoria</div>

                <div class="panel-body">

								@if(isset($post))
									<form action="{{ url('/administra/categoria/') }}/{{isset($post) ? $post->id : ''}}" method="POST">
										 {{ method_field('PUT') }}
										 {{ csrf_field() }}
										<input type="hidden" name="post_id" value="{{isset($post) ? $post->id : ''}}">
										 

										 <label for="title">Nom</label>
												 <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($post) ? $post->title : ''}}">
										 <label for="description">Descripció</label>
												 <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($post) {{$post->description}} @endisset</textarea>
										<label for="description">Imatge</label>
		 								   	 <textarea type="file" name="imatge" id="imatge" class="form-control" placeholder="Imatge..." rows="7">@isset($post) {{$post->description}} @endisset</textarea>
										 <label for="title">Publicar?</label>
												 <select name="status" id="status" class="form-control">
														 <option value="0" @isset($post) @if($post->status == 0) selected @endif @endisset>NO</option>
														 <option value="1" @isset($post) @if($post->status == 1) selected @endif @endisset>SI</option>
												 </select>
										 <input type="submit" class="btn btn-success" value="Guardar">
									</form>
										<form method="POST" action="http://localhost:8000/post/{{isset($post) ? $post->id : ''}}" accept-charset="UTF-8" class="pull-right">
											{{ csrf_field() }}
											<input name="_method" type="hidden" value="DELETE">
											<input class="btn btn-danger" type="submit" value="Borrar definitivament">
										</form>
									@endisset
				</div>
			</div>
		</div>
	</div>
</div>

@stop
