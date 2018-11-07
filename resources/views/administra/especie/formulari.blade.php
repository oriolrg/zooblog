<h2>Català</h2>
<label for="title">Nom</label>
<input type="text" name="title" id="title" class="form-control" placeholder="Título..." value="{{isset($editdata) ? $editdata->title : ''}}" maxlength="30">
<label for="title">Nom Científic</label>
<input type="text" name="nomcientific" id="nomcientific" class="form-control" placeholder="Nom Científic..." value="{{isset($editdata) ? $editdata->nomcientific : ''}}"  maxlength="30">
<label for="title">Ocurrència</label>
<input type="text" name="ocurrencia" id="ocurrencia" class="form-control" placeholder="ocurrencia..." value="{{isset($editdata) ? $editdata->ocurrencia : ''}}">
<label for="familia">Familia</label>
<select name="familia" id="familia" class="form-control" placeholder="familia..." value="{{isset($editdata) ? $editdata->familia : ''}}">
    @foreach($dataCategoria as $key => $familia)
        <option value="{{ $familia->id }}" @isset($editdata) @if($familia->id == $editdata->categoria_id) selected @endif @endisset>{{ $familia->title }}</option>
    @endforeach
</select>
<label for="title">Mida <a id="midaaddLevel" value="mida"> + Afegir nivell</a></label>
<input type="text" name="mida" id="mida" class="form-control" placeholder="mida..." value="{{isset($editdata) ? $editdata->mida : ''}}">
<label for="title">Pes <a id="pesaddLevel" value="pes"> + Afegir nivell</a></label>
<input type="text" name="pes" id="pes" class="form-control" rows="7" placeholder="pes..." value="{{isset($editdata) ? $editdata->pes : ''}}">
<label for="title">Embaràs</label>
<input type="text" name="embaras" id="embaras" class="form-control" placeholder="embaras..." value="{{isset($editdata) ? $editdata->embaras : ''}}">
<label for="title">Nº de cries</label>
<input type="text" name="cries" id="cries" class="form-control" placeholder="cries..." value="{{isset($editdata) ? $editdata->cries : ''}}">
<label for="title">Vida <a id="vidaaddLevel" value="vida"> + Afegir nivell</a></label>
<input type="text" name="vida" id="vida" class="form-control" placeholder="vida..." value="{{isset($editdata) ? $editdata->vida : ''}}">
<label for="title">Dieta <a id="dietaaddLevel" value="dieta"> + Afegir nivell</a></label>
<input type="text" name="dieta" id="dieta" class="form-control" placeholder="dieta..." value="{{isset($editdata) ? $editdata->dieta : ''}}">
<label for="title">Estatus de protecció</label>
<input type="text" name="proteccio" id="proteccio" class="form-control" placeholder="proteccio..." value="{{isset($editdata) ? $editdata->proteccio : ''}}">
<label for="description">Descripció <a id="descriptionaddLevel" value="description"> + Afegir nivell</a></label>
<textarea type="text" name="description" id="description" class="form-control" placeholder="Descripció..." rows="7" maxlength="600">@isset($editdata) {{$editdata->description}} @endisset</textarea>
<legend>Imatge</legend>
<label for="description">Nom descriptiu imatge</label>
<input type="text" name="alt_imatge" id="alt_imatge" class="form-control" placeholder="Nom descriptiu imatge..." value="{{isset($editdata) ? $editdata->alt_imatge : ''}}"  maxlength="30">
@include('administra.uploadimage.uploadimage1')
<label for="title">Publicar?</label>
<select name="status" id="status" class="form-control">
    <option value="0" @isset($editdata) @if($editdata->status == 0) selected @endif @endisset>NO</option>
    <option value="1" @isset($editdata) @if($editdata->status == 1) selected @endif @endisset>SI</option>
</select>
<input type="submit" class="btn btn-success" value="Guardar">
