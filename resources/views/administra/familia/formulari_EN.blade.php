<h2>Anglès</h2>
<label for="title">Nom</label>
<input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdataEN) ? $editdataEN->title : ''}}"  maxlength="30">
<label for="description">Descripció</label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7"  maxlength="600">@isset($editdataEN) {{$editdataEN->description}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdataEN) ? $editdataEN->alt_imatge : ''}}"  maxlength="30">
<button type="submit" class="btn btn-primary" >
  <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
