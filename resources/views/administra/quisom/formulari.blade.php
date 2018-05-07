<label for="title">Nom</label>
<input type="text" name="nom" id="nom" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->nom : ''}}">
<label for="funcions">Funcions</label>
<textarea type="text" name="funcions" id="funcions" class="form-control" placeholder="Funcions..." rows="2">@isset($editdata) {{$editdata->funcions}} @endisset</textarea>
<label for="description">Twitter</label>
<textarea type="text" name="twitter" id="twitter" class="form-control" placeholder="Enllaç a twitter..." rows="1">@isset($editdata) {{$editdata->twitter}} @endisset</textarea>
<label for="description">Facebook</label>
<textarea type="text" name="facebook" id="facebook" class="form-control" placeholder="Enllaç a Fecabook..." rows="1">@isset($editdata) {{$editdata->facebook}} @endisset</textarea>
<label for="description">Instagram</label>
<textarea type="text" name="instagram" id="instagram" class="form-control" placeholder="Enllaç a Instagram..." rows="1">@isset($editdata) {{$editdata->instagram}} @endisset</textarea>
<label for="description">Web</label>
<textarea type="text" name="linkedin" id="linkedin" class="form-control" placeholder="Enllaç a Web..." rows="1">@isset($editdata) {{$editdata->linkedin}} @endisset</textarea>
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
