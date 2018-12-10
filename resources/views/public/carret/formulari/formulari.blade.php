<div class="row">
    <div class="col-md-6">
        <h2>@isset($plataformaPagament){{$plataformaPagament->miss_detallsFac}}@endisset</h2>
        <label for="title">Nom</label>
        <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom..." maxlength="30">
        <label for="cognoms">Cognoms</label>
        <input type="text" name="cognoms" id="cognoms" class="form-control" placeholder="Cognoms...">
        <label for="direccio">Direcció</label><!-- TODO controlar que enllaç no sigui null -->
        <input type="text" name="direccio" id="direccio" class="form-control" placeholder="Direcció...">
        <label for="codiPostal">Codi Postal</label>
        <input name="codiPostal" id="codiPostal" class="form-control" placeholder="Codi Postal...">
        <label for="localitat">Localitat</label>
        <input name="localitat" id="localitat" class="form-control" placeholder="localitat...">
        <label for="telefon">Telèfon</label>
        <input name="telefon" id="telefon" class="form-control" placeholder="Telèfon...">
        <label for="dni">DNI</label>
        <input name="dni" id="dni" class="form-control" placeholder="dni...">
        <input type="hidden" name="preu" value="{{ $apadrina->preu}}" />
        <input type="hidden" name="order" value="{{ $apadrina->id }}" />
        <input type="hidden" name="descripcio" value="{{ $apadrina->nom}}" />
        <button id="comprar" type="submit" class="btn btn-primary" name="@isset($plataformaPagament){{$plataformaPagament->miss_fiCompra}}@endisset"><i class="glyphicon glyphicon-credit-card">@isset($plataformaPagament){{$plataformaPagament->miss_fiCompra}}@endisset</i></button>
    </div>
    <div class="col-md-6">
        <h4>@isset($plataformaPagament){{$plataformaPagament->miss_modePagament}}@endisset</h4>
        @isset($plataformaPagament){{$plataformaPagament->mode_pagament}}@endisset
    </div>
</div> 

