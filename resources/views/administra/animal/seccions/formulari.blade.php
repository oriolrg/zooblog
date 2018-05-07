<label for="title">Nom</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}">
<label for="description">Descripció</label>
    <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($editdata) {{$editdata->description}} @endisset</textarea>
<label for="llista">Llista items</label>
    <textarea type="text" name="list" id="list" class="form-control" placeholder="Llista items separats per coma..." rows="7">@isset($editdata) {{$editdata->list}} @endisset</textarea>
<legend>Imatge</legend>
@include('administra.uploadimage.uploadimage1')
<label for="title">Publicar?</label>
<select name="status" id="status" class="form-control">
        <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
        <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
</select>
<input type="submit" class="btn btn-success" value="Guardar">
