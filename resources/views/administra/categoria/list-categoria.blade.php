@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories d'animals</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="llistarCategoria"><a href="#">Llistar categories</a></li>
                    <li id="crearCategoria"><a href="#">Crear nova categoria</a></li>
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
                    @foreach($data as $key => $categoria)
                        <tr class="success
                            " id="{{ $categoria->id }}">

                            <td class="nom">
                                {{ $categoria->title}}
                            </td>
                            <td class="poblacio">
                                {{ $categoria->description}}
                            </td>
                            <td class="actiu">
                              @if ($categoria->status === 1)
                                  <span style="color:green">Actiu</span>
                              @else
                                  <span style="color:red">Inactiu</span>
                              @endif
                            </td>
                            <td class="imatge">
                              <img src="{{asset('storage/')}}/{{$categoria->imatge}}" width="80px" class="img_thumbnail">
                            </td>
                            <td class="accions">
                              {{ csrf_field() }}
                                </lavel>
                                <lavel id="modificar">
                                    <button type="submit" class="btn btn-primary btn-xs" name="id_restaurant" value="{{ $categoria->id }}" data-content="Modificar categoria" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='/administra/categoria/{{ $categoria->id }}/edit'">
                                        <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                    </button>
                                </lavel>
                                <form>
                                <lavel id="eliminar">
                                    <button type="submit" class="buton eliminar btn btn-danger btn-xs" name="categoria" value="{{ $categoria->id }}" data-content="Eliminar categoria" title="Eliminar" data-toggle="popover" data-trigger="hover">
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
                    <form  enctype="multipart/form-data" action="{{ url('administra/categoria') }}" method="POST">
                    {{ csrf_field() }}
                            @if(isset($post))
                                <input type="hidden" name="post_id" value="{{isset($post) ? $post->id : ''}}">
                            @endif
                            <label for="title">Nom</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($post) ? $post->title : ''}}">
                            <label for="description">Descripció</label>
                            <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($post) {{$post->description}} @endisset</textarea>



                            
                            <legend>Imatge</legend>
                            @include('administra.uploadimage.uploadimage1')
                            <label for="title">Publicar?</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0" @isset($post) @if($post->status == 0) selected @endif @endisset>NO</option>
                                <option value="1" @isset($post) @if($post->status == 1) selected @endif @endisset>SI</option>
                            </select>
                            <button type="submit" class="btn btn-primary" >
                                    <i class="glyphicon glyphicon-send"> Enviar </i>
                                </button>
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
