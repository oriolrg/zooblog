<h2>Anglès</h2>
<label for="title">Avis legal Plataforma compra</label>
<textarea type="text" name="avis_legalEN" id="avis_legalEN" class="form-control" placeholder="Avis legal..." rows="2">@isset($dataAdministraEN) {{$dataAdministraEN->avis_legal}} @endisset</textarea>
<label for="llista">Condicions i privilegis d'un apadrinament</label>
<textarea type="text" name="condicionsEN" id="condicionsEN" class="form-control" placeholder="Condicions i privilegis..." rows="2">@isset($dataAdministraEN) {{$dataAdministraEN->condicions}} @endisset</textarea>
<label for="description">Descripció del metode de pagament</label>
<textarea type="text" name="mode_pagamentEN" id="mode_pagamentEN" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministraEN) {{$dataAdministraEN->mode_pagament}} @endisset</textarea>
<label for="description">Missatge de finalització de la copra</label>
<input type="text" name="miss_fiCompraEN" id="miss_fiCompraEN" class="form-control" placeholder="Missatge de finalització de la copra..." value="{{isset($dataAdministraEN) ? $dataAdministraEN->miss_fiCompra : ''}}"  maxlength="30">
<label for="description">Missatge detalls de facturació</label>
<input type="text" name="miss_detallsFacEN" id="miss_detallsFacEN" class="form-control" placeholder="Missatge detalls de facturació..." value="{{isset($dataAdministraEN) ? $dataAdministraEN->miss_detallsFac : ''}}"  maxlength="30">
<label for="description">Missatge mode de pagament</label>
<input type="text" name="miss_modePagamentEN" id="miss_modePagamentEN" class="form-control" placeholder="Missatge mode de pagament..." value="{{isset($dataAdministraEN) ? $dataAdministraEN->miss_modePagament : ''}}"  maxlength="30">
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>