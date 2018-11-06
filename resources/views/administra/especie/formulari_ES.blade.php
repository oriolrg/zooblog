<h2>Castellà</h2>
<label for="title">Nom</label>
<input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdataES) ? $editdataES->title : ''}}" maxlength="30">
<label for="title">Nom Científic</label>
<input type="text" name="nomcientific" id="nomcientific" class="form-control" placeholder="Nom Científic..." value="{{isset($editdataES) ? $editdataES->nomcientific : ''}}"  maxlength="30">
<label for="title">Ocurrència</label>
<input type="text" name="ocurrencia" id="ocurrencia" class="form-control" placeholder="ocurrencia..." value="{{isset($editdataES) ? $editdataES->ocurrencia : ''}}">
<label for="title">Mida <a id="midaaddLevel" value="mida"> + Afegir nivell</a></label>
<input type="text" name="mida" id="mida" class="form-control" placeholder="mida..." value="{{isset($editdataES) ? $editdataES->mida : ''}}">
<label for="title">Pes <a id="pesaddLevel" value="pes"> + Afegir nivell</a></label>
<input type="text" name="pes" id="pes" class="form-control" rows="7" placeholder="pes..." value="{{isset($editdataES) ? $editdataES->pes : ''}}">
<label for="title">Embaràs</label>
<input type="text" name="embaras" id="embaras" class="form-control" placeholder="embaras..." value="{{isset($editdataES) ? $editdataES->embaras : ''}}">
<label for="title">Nº de cries</label>
<input type="text" name="cries" id="cries" class="form-control" placeholder="cries..." value="{{isset($editdataES) ? $editdataES->cries : ''}}">
<label for="title">Vida <a id="vidaaddLevel" value="vida"> + Afegir nivell</a></label>
<input type="text" name="vida" id="vida" class="form-control" placeholder="vida..." value="{{isset($editdataES) ? $editdataES->vida : ''}}">
<label for="title">Dieta <a id="dietaaddLevel" value="dieta"> + Afegir nivell</a></label>
<input type="text" name="dieta" id="dieta" class="form-control" placeholder="dieta..." value="{{isset($editdataES) ? $editdataES->dieta : ''}}">
<label for="title">Estatus de protecció</label>
<input type="text" name="proteccio" id="proteccio" class="form-control" placeholder="proteccio..." value="{{isset($editdataES) ? $editdataES->proteccio : ''}}">
<label for="description">Descripció <a id="descriptionaddLevel" value="description"> + Afegir nivell</a></label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7" maxlength="600">@isset($editdataES) {{$editdataES->description}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdataES) ? $editdataES->alt_imatge : ''}}"  maxlength="30">
<input type="submit" class="btn btn-success" value="Guardar">
