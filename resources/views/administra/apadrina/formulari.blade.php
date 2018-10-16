<label for="title">Nom</label>
<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." value="{{isset($editdata) ? $editdata->nom : ''}}"  maxlength="30">
<label for="description">Descripcio</label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="2">@isset($editdata) {{$editdata->descripcio}} @endisset</textarea>
<label for="preu">Preu</label><!-- TODO controlar que enllaç no sigui null -->
<input type="text" name="preu" id="preu" class="form-control" placeholder="0€..." value="{{isset($editdata) ? $editdata->link : ''}}">
<label for="familia">Familia</label>
<select name="familia" id="familia" class="form-control" placeholder="familia..." value="{{isset($editdata) ? $editdata->familia : ''}}">
@foreach($dataCategoria as $key => $familia)
    <option value="{{ $familia->id }}">{{ $familia->title }}</option>
@endforeach
</select>
<label for="especie">Espècie</label>
<select name="especie" id="especie" class="form-control" placeholder="especie..." value="{{isset($editdata) ? $editdata->familia : ''}}">
@foreach($dataAnimal as $key => $especie)
    <option value="{{ $especie->id }}">{{ $especie->title }}</option>
@endforeach
</select>
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
