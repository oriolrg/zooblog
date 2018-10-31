                <label for="title">Titol del Blog</label>
                <input type="text" name="titol" id="titol" class="form-control" placeholder="Nom..." value="{{isset($dataAdministra) ? $dataAdministra[0]->titol : ''}}"  maxlength="30">
                <label for="llista">Llista paraules de descripció del blog. (Separades per coma)</label>
                <textarea type="text" name="llista" id="llista" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra[0]->llista}} @endisset</textarea>
                <label for="description">Descripció del blog</label>
                <textarea type="text" name="descripcio" id="descripcio" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra[0]->description}} @endisset</textarea>
                <legend>Imatge Logotip del blog</legend>
                @include('administra.uploadimage.uploadimage1')
                <button type="submit" class="btn btn-primary" >
                        <i class="glyphicon glyphicon-send"> Enviar </i>
                </button>