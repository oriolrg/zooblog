<h2>Català</h2>
<label for="title">Nom</label>
<input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}"  maxlength="30">
<label for="title">Nom Científic</label>
<input type="text" name="nomcientific" id="nomcientific" class="form-control" placeholder="Nom Científic..." value="{{isset($editdata) ? $editdata->nomcientific : ''}}"  maxlength="30">
<label for="description">Descripció</label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7"  maxlength="600">@isset($editdata) {{$editdata->description}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdata) ? $editdata->alt_imatge : ''}}"  maxlength="30">
@include('administra.uploadimage.uploadimage1')
<label for="title">Publicar?</label>
<select name="status" id="status" class="form-control">
  <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
  <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
</select>
<button type="submit" class="btn btn-primary" >
  <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
