@extends('layouts.administraapp')

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
                        <li class="llistarCategoria" id="catala"><a href="#">Català</a></li>
                        <li id="castella"><a href="#">Castellà</a></li>
                        <li id="angles"><a href="#">Anglès</a></li>
                    </ul>
                    </div>
                    <div id="formCatala">
                        <form  enctype="multipart/form-data"  action="{{ url('administra/contacta/1/edit') }}" method="PUT">
                            {{ csrf_field() }}
                            @if(isset($editdata))
                                <input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
                            @endif
                            @include('administra.contacta.formulari')
                        </form>
                    </div>
                    <div id="formCastella">
                        <form  enctype="multipart/form-data"  action="{{ url('ES/administra/contacta/1/edit') }}" method="PUT">
                            {{ csrf_field() }}
                            @if(isset($editdata))
                                <input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
                            @endif
                            @include('administra.contacta.formulariES')
                        </form>
                    </div>
                    <div id="formAngles">
                        <form  enctype="multipart/form-data"  action="{{ url('EN/administra/contacta/1/edit') }}" method="PUT">
                            {{ csrf_field() }}
                            @if(isset($editdata))
                                <input type="hidden" name="post_id" value="{{isset($editdata) ? $editdata->id : ''}}">
                            @endif
                            @include('administra.contacta.formulariEN')
                        </form>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
    <script src="{{ asset('js/funcions.js') }}"></script>
@endsection
