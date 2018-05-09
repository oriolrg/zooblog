@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Qui sóm</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="llistarCategoria"><a href="#">Contacta</a></li>
                    <li id="crearCategoria"><a href="#">Crear contacta</a></li>
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
                        <th>Direcció<span></span></th>
                        <th>Telèfon<span></span></th>
                        <th>Email<span></span></th>
                        <th>Latitud<span></span></th>
                        <th>Longitud<span></span></th>
                        <th>Accions<span></span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $categoria)
                        <tr class="success
                            " id="{{ $categoria->id }}">
                            <td class="funcions">
                                {{ $categoria->direccio}}
                            </td>
                            <td class="nom">
                                {{ $categoria->telefon}}
                            </td>
                            <td class="funcions">
                                {{ $categoria->email}}
                            </td>
                            <td class="funcions">
                                {{ $categoria->latitud}}
                            </td>
                            <td class="funcions">
                                {{ $categoria->longitud}}
                            </td>
                            <td class="accions">
                              {{ csrf_field() }}
                                </lavel>
                                <lavel id="modificar">
                                    <button type="submit" class="btn btn-primary btn-xs" name="id_restaurant" value="{{ $categoria->id }}" data-content="Modificar categoria" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='/administra/contacta/{{ $categoria->id }}/edit'">
                                        <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                    </button>
                                </lavel>
                                <lavel id="eliminar">
                                    <button type="submit" class="buton eliminar btn btn-danger btn-xs" name="contacta" value="{{ $categoria->id }}" data-content="Eliminar categoria" title="Eliminar" data-toggle="popover" data-trigger="hover">
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
                    <form  enctype="multipart/form-data" action="{{ url('administra/contacta') }}" method="POST">
                    {{ csrf_field() }}
                            @if(isset($post))
                                <input type="hidden" name="post_id" value="{{isset($post) ? $post->id : ''}}">
                            @endif
                            @include('administra.contacta.formulari')
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
