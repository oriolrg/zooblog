	@extends('layouts.app')



@section('content')
@include('administra.menu.menu')
<div class="container post">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edita {{$editdata->title}}</div>

                <div class="panel-body">

					@if(isset($editdata))
						<form  enctype="multipart/form-data"  action="{{ url('/administra/animal/') }}/{{isset($editdata) ? $editdata->id : ''}}" method="POST">
							{{ method_field('PUT') }}
							{{ csrf_field() }}
                            @if(isset($editdata))
                                <input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
                            @endif
                            <label for="title">Nom</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}">
                            <label for="title">Nom Científic</label>
                            <input type="text" name="nomcientific" id="nomcientific" class="form-control" placeholder="Nom Científic..." value="{{isset($editdata) ? $editdata->nomcientific : ''}}">
                            <label for="title">Ocurrència</label>
                            <input type="text" name="ocurrencia" id="ocurrencia" class="form-control" placeholder="ocurrencia..." value="{{isset($editdata) ? $editdata->ocurrencia : ''}}">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control" placeholder="categoria..." value="{{isset($editdata) ? $editdata->categoria : ''}}">
                            @foreach($dataCategoria as $key => $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
                            @endforeach
                            </select>
                            <label for="title">Mida</label>
                            <input type="text" name="mida" id="mida" class="form-control" placeholder="mida..." value="{{isset($editdata) ? $editdata->mida : ''}}">
                            <label for="title">Pes</label>
                            <input type="text" name="pes" id="pes" class="form-control" placeholder="pes..." value="{{isset($editdata) ? $editdata->pes : ''}}">
                            <label for="title">Embaràs</label>
                            <input type="text" name="embaras" id="embaras" class="form-control" placeholder="embaras..." value="{{isset($editdata) ? $editdata->embaras : ''}}">
                            <label for="title">Nº de cries</label>
                            <input type="text" name="cries" id="cries" class="form-control" placeholder="cries..." value="{{isset($editdata) ? $editdata->cries : ''}}">
                            <label for="title">Vida</label>
                            <input type="text" name="vida" id="vida" class="form-control" placeholder="vida..." value="{{isset($editdata) ? $editdata->vida : ''}}">
                            <label for="title">Dieta</label>
                            <input type="text" name="dieta" id="dieta" class="form-control" placeholder="dieta..." value="{{isset($editdata) ? $editdata->dieta : ''}}">
                            <label for="title">Estatus de protecció</label>
                            <input type="text" name="proteccio" id="proteccio" class="form-control" placeholder="proteccio..." value="{{isset($editdata) ? $editdata->proteccio : ''}}">
                            <label for="description">Descripció</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($editdata) {{$editdata->description}} @endisset</textarea>
                            <label for="description">Imatge</label>
                            @include('administra.uploadimage.uploadimage1')
                            <label for="title">Publicar?</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
                                <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
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