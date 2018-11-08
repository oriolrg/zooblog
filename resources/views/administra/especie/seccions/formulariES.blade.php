<h2>Castellà</h2>
<label for="title">Nom</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdataES) ? $editdataES->title : ''}}"  maxlength="30">
<label for="description">Descripció</label>
    <textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7">@isset($editdataES) <?php echo strip_tags($editdataES->description);?> @endisset</textarea>
<label for="llista">Llista items <a id="LlistaItemsnaddLevel" value="description"> + Afegir nivell</a></label>
    <textarea type="text" name="list" id="list" class="form-control" placeholder="Llista items separats per coma..." rows="7">@isset($editdataES) {{$editdataES->list}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdataES) ? $editdataES->alt_imatge : ''}}"  maxlength="30">
<input type="submit" class="btn btn-success" value="Guardar">
