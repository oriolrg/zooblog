<h2>Català</h2>
<label for="title">Titol del Blog</label>
<input type="text" name="titol" id="titol" class="form-control" placeholder="Nom..." value="{{isset($dataAdministra) ? $dataAdministra->titol : ''}}"  maxlength="30">
<label for="llista">Llista paraules de descripció del blog. (Separades per coma)</label>
<textarea type="text" name="llista" id="llista" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra->llista}} @endisset</textarea>
<label for="description">Descripció del blog</label>
<textarea type="text" name="descripcio" id="descripcio" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra->description}} @endisset</textarea>
<label for="description">Menú</label>
<textarea type="text" name="menu1" id="menu1" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu1}} @endisset</textarea>
<textarea type="text" name="menu2" id="menu2" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu2}} @endisset</textarea>
<textarea type="text" name="menu3" id="menu3" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu3}} @endisset</textarea>
<textarea type="text" name="menu4" id="menu4" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu4}} @endisset</textarea>
<textarea type="text" name="menu5" id="menu5" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu5}} @endisset</textarea>
<textarea type="text" name="menu6" id="menu6" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministra) {{$dataAdministra->menu6}} @endisset</textarea>
<label for="description">Missatge política privacitat</label>
<textarea type="text" name="politicaPrivacitat" id="politicaPrivacitat" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra->politicaPrivacitat}} @endisset</textarea>
<legend>Imatge Logotip del blog</legend>
@include('administra.uploadimage.uploadimage1')
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>