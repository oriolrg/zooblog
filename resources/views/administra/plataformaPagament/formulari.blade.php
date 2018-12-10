<h2>Català</h2>
<label for="title">Avis legal Plataforma compra</label>
<textarea type="text" name="avis_legal" id="avis_legal" class="form-control" placeholder="Avis legal..." rows="2">@isset($dataAdministra) {{$dataAdministra->avis_legal}} @endisset</textarea>
<label for="llista">Condicions i privilegis d'un apadrinament</label>
<textarea type="text" name="condicions" id="condicions" class="form-control" placeholder="Condicions i privilegis..." rows="2">@isset($dataAdministra) {{$dataAdministra->condicions}} @endisset</textarea>
<label for="description">Descripció del metode de pagament</label>
<textarea type="text" name="mode_pagament" id="mode_pagament" class="form-control" placeholder="Descripció..." rows="2">@isset($dataAdministra) {{$dataAdministra->mode_pagament}} @endisset</textarea>
<label for="description">Missatge de finalització de la copra</label>
<input type="text" name="miss_fiCompra" id="miss_fiCompra" class="form-control" placeholder="Missatge de finalització de la copra..." value="{{isset($dataAdministra) ? $dataAdministra->miss_fiCompra : ''}}"  maxlength="30">
<label for="description">Missatge detalls de facturació</label>
<input type="text" name="miss_detallsFac" id="miss_detallsFac" class="form-control" placeholder="Missatge detalls de facturació..." value="{{isset($dataAdministra) ? $dataAdministra->miss_detallsFac : ''}}"  maxlength="30">
<label for="description">Missatge mode de pagament</label>
<input type="text" name="miss_modePagament" id="miss_modePagament" class="form-control" placeholder="Missatge mode de pagament..." value="{{isset($dataAdministra) ? $dataAdministra->miss_modePagament : ''}}"  maxlength="30">
<button type="submit" class="btn btn-primary" >
        <i class="glyphicon glyphicon-send"> Enviar </i>
</button>

