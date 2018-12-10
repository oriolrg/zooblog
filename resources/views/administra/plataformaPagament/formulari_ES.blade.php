<h2>Castellà</h2>
<label for="title">Avis legal Plataforma compra</label>
<textarea type="text" name="avis_legalES" id="avis_legalES" class="form-control" placeholder="Avis legal..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->avis_legal}} @endisset</textarea>
<label for="llista">Condicions i privilegis d'un apadrinament</label>
<textarea type="text" name="condicionsES" id="condicionsES" class="form-control" placeholder="Condicions i privilegis..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->condicions}} @endisset</textarea>
<label for="description">Descripció del metode de pagament</label>
<textarea type="text" name="mode_pagamentES" id="mode_pagamentES" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraES) {{$dataAdministraES->mode_pagament}} @endisset</textarea>
<label for="description">Missatge de finalització de la copra</label>
<input type="text" name="miss_fiCompraES" id="miss_fiCompraES" class="form-control" placeholder="Missatge de finalització de la copra..." value="{{isset($dataAdministraES) ? $dataAdministraES->miss_fiCompra : ''}}"  maxlength="30">
<label for="description">Missatge detalls de facturació</label>
<input type="text" name="miss_detallsFacES" id="miss_detallsFacES" class="form-control" placeholder="Missatge detalls de facturació..." value="{{isset($dataAdministraES) ? $dataAdministraES->miss_detallsFac : ''}}"  maxlength="30">
<label for="description">Missatge mode de pagament</label>
<input type="text" name="miss_modePagamentES" id="miss_modePagamentES" class="form-control" placeholder="Missatge mode de pagament..." value="{{isset($dataAdministraES) ? $dataAdministraES->miss_modePagament : ''}}"  maxlength="30">
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>