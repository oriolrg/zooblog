                <h2>Castellà</h2>
                <label for="title">Titol del Blog</label>
                <input type="text" name="titol_ES" id="titol_ES" class="form-control" placeholder="Nom..." value="{{isset($dataAdministraES) ? $dataAdministraES->titol : ''}}"  maxlength="30">
                <label for="llista">Llista paraules de descripció del blog. (Separades per coma)</label>
                <textarea type="text" name="llista_ES" id="llista_ES" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->llista }} @endisset</textarea>
                <label for="description">Descripció del blog</label>
                <textarea type="text" name="descripcio_ES" id="descripcio_ES" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->description }} @endisset</textarea>
                <button type="submit" class="btn btn-primary" >
                        <i class="glyphicon glyphicon-send"> Enviar </i>
                </button>