<h2>Anglès</h2>
<label for="title">Nom</label>
<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." value="{{isset($editdataEN) ? $editdataEN->nom : ''}}"  maxlength="30">
<label for="description">Descripcio</label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="6">@isset($editdataEN) {{$editdataEN->description}} @endisset</textarea>
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
