@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Familia d'animals</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="llistarCategoria"><a href="#">Llistar Families</a></li>
                    <li id="crearCategoria"><a href="#">Crear nova familia</a></li>
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
                    @foreach($data as $key => $familia)
                        <tr class="success
                            " id="{{ $familia->id }}">

                            <td class="nom">
                                {{ $familia->title}}
                            </td>
                            <td class="poblacio">
                                {{ $familia->description}}
                            </td>
                            <td class="actiu">
                              @if ($familia->status === 1)
                                  <span style="color:green">Actiu</span>
                              @else
                                  <span style="color:red">Inactiu</span>
                              @endif
                            </td>
                            <td class="imatge">
                              <img src="{{asset('/storage/app/public//')}}/{{$familia->imatge}}" width="80px" class="img_thumbnail">
                            </td>
                            <td class="accions">
                              {{ csrf_field() }}
                                </lavel>
                                <lavel id="modificar">
                                    <button type="submit" class="btn btn-primary btn-xs" name="id_restaurant" value="{{ $familia->id }}" data-content="Modificar familia" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='{{asset('/administra/familia/')}}/{{ $familia->id }}/edit'">
                                        <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                    </button>
                                </lavel>
                                <lavel id="eliminar">
                                    <button type="submit" class="buton eliminar btn btn-danger btn-xs" name="familia" value="{{ $familia->id }}" data-content="Eliminar familia" title="Eliminar" data-toggle="popover" data-trigger="hover">
                                    {{ csrf_field() }}
                                        <i class="glyphicon glyphicon-remove"> Eliminar </i>
                                    </button>
                                </lavel>
                            </td>
                    @endforeach
                    </tbody>

                </table>
                </div>

                <div id="formCategoria">
                    <form  enctype="multipart/form-data" action="{{ url('administra/familia') }}" method="POST">
                    {{ csrf_field() }}
                            @if(isset($post))
                                <input type="hidden" name="post_id" value="{{isset($post) ? $post->id : ''}}">
                            @endif
                            @include('administra.familia.formulari')
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
