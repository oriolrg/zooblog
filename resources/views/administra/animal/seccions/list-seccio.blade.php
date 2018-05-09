@extends('layouts.app')

@section('content')
@include('administra.menu.menu')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('/administra/animal/') }}" style="text-decoration:none; "><i class="hidden-xl" style="font-size:large;">←</i></a> Seccions {{ $dataAnimal->title}}</div>

                <div class="panel-body">
                <div>
                  <ul class="nav nav-tabs">
                    <li class="llistarCategoria" id="llistarCategoria"><a href="#">Llistar seccions {{ $dataAnimal->title}}</a></li>
                    <li id="crearCategoria"><a href="#">Crear nova Secció</a></li>
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
                    @foreach($dataSeccio as $key => $seccio)
                        <tr class="success
                            " id="{{ $seccio->id }}">

                            <td class="nom">
                                {{ $seccio->title}}
                            </td>
                            <td class="poblacio">
                                {{ $seccio->description}}
                            </td>
                            <td class="actiu">
                              @if ($seccio->status === 1)
                                  <span style="color:green">Actiu</span>
                              @else
                                  <span style="color:red">Inactiu</span>
                              @endif
                            </td>
                            <td class="imatge">
                              <img src="{{asset('/storage/app/public//')}}/{{$seccio->imatge}}" width="80px" class="img_thumbnail">
                            </td>
                            <td class="accions">
                              {{ csrf_field() }}
                                <!--<lavel id="seccions">
                                    <button type="submit" class="btn btn-primary btn-xs" name="seccions" value="{{ $seccio->id }}" data-content="seccions animal" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='/administra/animal/seccions/{{ $dataAnimal->id }}'">
                                        <i class="glyphicon glyphicon-pencil"> Comentaris </i>
                                    </button>
                                </lavel>-->
                                <lavel id="modificar">
                                    <button type="submit" class="btn btn-primary btn-xs" name="modificar" value="{{ $seccio->id }}" data-content="Modificar animal" title="Modificar" data-toggle="popover" data-trigger="hover" onclick="window.location.href='{{asset('/administra/animal/seccions/')}}/{{ $seccio->id }}/edit'">
                                        <i class="glyphicon glyphicon-pencil"> Modificar </i>
                                    </button>
                                </lavel>
                                <lavel id="eliminar">
                                    <button class="buton eliminar btn btn-danger btn-xs" name="animal/seccions" value="{{ $seccio->id }}" data-content="Eliminar animal" title="Eliminar" data-toggle="popover" data-trigger="hover">
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
                    <form  enctype="multipart/form-data"  action="{{ url('administra/animal/seccions') }}" method="POST">
                    {{ csrf_field() }}
                            @if(isset($dataAnimal))
                                <input type="hidden" name="animal_id" value="{{isset($dataAnimal) ? $dataAnimal->id : ''}}">
                            @endif
                            @include('administra.animal.seccions.formulari')
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
