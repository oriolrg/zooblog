<label for="title">Nom</label>
<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." value="{{isset($editdata) ? $editdata->nom : ''}}">
<label for="description">Funcions</label>
<textarea type="text" name="funcions" id="funcions" class="form-control" placeholder="Funcions..." rows="2">@isset($editdata) {{$editdata->descripcio}} @endisset</textarea>
<label for="link">Enllaç</label><!-- TODO controlar que enllaç no sigui null -->
<input type="text" name="link" id="link" class="form-control" placeholder="Enllaç..." value="{{isset($editdata) ? $editdata->link : ''}}">
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
