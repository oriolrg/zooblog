<h2>Català</h2>
<label for="title">Nom</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}"  maxlength="30">
<label for="description">Descripció</label>
    <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($editdata) <?php echo strip_tags($editdata->description);?> @endisset</textarea>
<label for="llista">Llista items <a id="LlistaItemsnaddLevel" value="description"> + Afegir nivell</a></label>
    <textarea type="text" name="list" id="list" class="form-control" placeholder="Llista items separats per coma..." rows="7">@isset($editdata) {{$editdata->list}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdata) ? $editdata->alt_imatge : ''}}"  maxlength="30">
@include('administra.uploadimage.uploadimage1')
<label for="title">Ordre</label>
<select name="ordre" id="ordre" class="form-control">
    @isset($dataSeccio)
        @for ($i = 1; $i <= count($dataSeccio); $i++)
            <option value="{{$i}}">{{$i}}</option>
        @endfor
            <option value="{{$i}}"  selected >{{$i}}</option>
    @endisset
    @isset($dataSeccioUpdate)
        @for ($i = 1; $i <= count($dataSeccioUpdate); $i++)
            <option value="{{$i}}"  @if($editdata->ordre == $i) selected @endif>{{$i}}</option>
        @endfor
    @endisset
</select>
<label for="title">Publicar?</label>
<select name="status" id="status" class="form-control">
        <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
        <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
</select>
<input type="submit" class="btn btn-success" value="Guardar">
