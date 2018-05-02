@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Animals</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="llistarCategoria"><a href="#">Llistar animals</a></li>
                    <li id="crearCategoria"><a href="#">Crear nou animal</a></li>
                  </ul>
                </div>
                <div id="llistaCategoria">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="tableCategories" class="table table-striped tablesorter">
                    <thead>
                    <tr>
                        <th>Titol<span></span></th>
                        <th>Descripció<span></span></th>
                        <th>Visible<span></span></th>
                        <th>Imatge<span></span></th>
                        <th>Accions<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($dataAnimal as $key => $animal)
                        <tr class="success
                            " id="{{ $animal->id }}">

                            <td class="nom">
                                {{ $animal->title}}
                            </td>
                            <td class="poblacio">
                                {{ $animal->description}}
                            </td>
                            <td class="actiu">
                              @if ($animal->status === 1)
                                  <span style="color:green">Actiu</span>
                              @else
                                  <span style="color:red">Inactiu</span>
                              @endif
                            </td>
                            <td class="imatge">
                              <img src="{{asset('storage/')}}/{{$animal->imatge}}" width="80px" class="img_thumbnail">
                            </td>
                            <td class="accions">
                              {{ csrf_field() }}
                                <lavel id="seccions">
                                    <button type="submit" class="btn btn-primary btn-xs" name="seccions" value="{{ $animal->id }}" data-content="seccions animal" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='/administra/animal/seccions/{{ $animal->id }}'">
                                        <i class="glyphicon glyphicon-pencil"> Seccions </i>
                                    </button>
                                </lavel>
                                <lavel id="modificar">
                                    <button type="submit" class="btn btn-primary btn-xs" name="modificar" value="{{ $animal->id }}" data-content="Modificar animal" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='/administra/animal/{{ $animal->id }}/edit'">
                                        <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                    </button>
                                </lavel>
                                <form>
                                <lavel id="eliminar">
                                    <button type="submit" class="buton eliminar btn btn-danger btn-xs" name="animal" value="{{ $animal->id }}" data-content="Eliminar animal" title="Eliminar" data-toggle="popover" data-trigger="hover">
                                    {{ csrf_field() }}
                                        <i class="glyphicon glyphicon-remove"> Eliminar </i>
                                    </button>
                                </lavel>
                                </form>
                            </td>
                    @endforeach
                    </tbody>

                </table>
                </div>

                <div id="formCategoria">
                    <form  enctype="multipart/form-data"  action="{{ url('administra/animal') }}" method="POST">
                    {{ csrf_field() }}
                            @if(isset($post))
                                <input type="hidden" name="post_id" value="{{isset($post) ? $post->id : ''}}">
                            @endif
                            <label for="title">Nom</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($post) ? $post->title : ''}}">
                            <label for="title">Nom Científic</label>
                            <input type="text" name="nomcientific" id="nomcientific" class="form-control" placeholder="Nom Científic..." value="{{isset($post) ? $post->nomcientific : ''}}">
                            <label for="title">Ocurrència</label>
                            <input type="text" name="ocurrencia" id="ocurrencia" class="form-control" placeholder="ocurrencia..." value="{{isset($post) ? $post->ocurrencia : ''}}">
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control" placeholder="categoria..." value="{{isset($post) ? $post->categoria : ''}}">
                            @foreach($dataCategoria as $key => $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
                            @endforeach
                            </select>
                            <label for="title">Mida</label>
                            <input type="text" name="mida" id="mida" class="form-control" placeholder="mida..." value="{{isset($post) ? $post->mida : ''}}">
                            <label for="title">Pes</label>
                            <input type="text" name="pes" id="pes" class="form-control" placeholder="pes..." value="{{isset($post) ? $post->pes : ''}}">
                            <label for="title">Embaràs</label>
                            <input type="text" name="embaras" id="embaras" class="form-control" placeholder="embaras..." value="{{isset($post) ? $post->embaras : ''}}">
                            <label for="title">Nº de cries</label>
                            <input type="text" name="cries" id="cries" class="form-control" placeholder="cries..." value="{{isset($post) ? $post->cries : ''}}">
                            <label for="title">Vida</label>
                            <input type="text" name="vida" id="vida" class="form-control" placeholder="vida..." value="{{isset($post) ? $post->vida : ''}}">
                            <label for="title">Dieta</label>
                            <input type="text" name="dieta" id="dieta" class="form-control" placeholder="dieta..." value="{{isset($post) ? $post->dieta : ''}}">
                            <label for="title">Estatus de protecció</label>
                            <input type="text" name="proteccio" id="proteccio" class="form-control" placeholder="proteccio..." value="{{isset($post) ? $post->proteccio : ''}}">
                            <label for="description">Descripció</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($post) {{$post->description}} @endisset</textarea>
                            <legend>Imatge</legend>
                            @include('administra.uploadimage.uploadimage1')
                            <label for="title">Publicar?</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" @isset($post) @if($post->status == 0) selected @endif @endisset>NO</option>
                                <option value="1" @isset($post) @if($post->status == 1) selected @endif @endisset>SI</option>
                            </select>
                            <input type="submit" class="btn btn-success" value="Guardar">
                    </form>
                    @isset($post)
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




@endsection
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
