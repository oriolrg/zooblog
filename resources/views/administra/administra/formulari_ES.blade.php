<h2>Castellà</h2>
<label for="title">Titol del Blog</label>
<input type="text" name="titol_ES" id="titol_ES" class="form-control" placeholder="Nom..." value="{{isset($dataAdministraES) ? $dataAdministraES->titol : ''}}"  maxlength="30">
<label for="llista">Llista paraules de descripció del blog. (Separades per coma)</label>
<textarea type="text" name="llista_ES" id="llista_ES" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->llista }} @endisset</textarea>
<label for="description">Descripció del blog</label>
<textarea type="text" name="descripcio_ES" id="descripcio_ES" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->description }} @endisset</textarea>
<label for="description">Menú</label>
<textarea type="text" name="menu1" id="menu1" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu1}} @endisset</textarea>
<textarea type="text" name="menu2" id="menu2" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu2}} @endisset</textarea>
<textarea type="text" name="menu3" id="menu3" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu3}} @endisset</textarea>
<textarea type="text" name="menu4" id="menu4" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu4}} @endisset</textarea>
<textarea type="text" name="menu5" id="menu5" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu5}} @endisset</textarea>
<textarea type="text" name="menu6" id="menu6" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu6}} @endisset</textarea>
<textarea type="text" name="menu7" id="menu7" class="form-control" placeholder="Descripció..." rows="1">@isset($dataAdministraES) {{$dataAdministraES->menu7}} @endisset</textarea>
<label for="description">Missatge política privacitat</label>
<textarea type="text" name="politicaPrivacitat" id="politicaPrivacitat" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->politicaPrivacitat}} @endisset</textarea>
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>