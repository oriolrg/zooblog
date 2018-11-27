<div class="row">
    <div class="col-md-6">
        <h2>Missatge Detalls de Facturació</h2>
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
        <button id="comprar" type="submit" class="btn btn-primary" name="Missatge Realitzar la comanda"><i class="glyphicon glyphicon-credit-card">Missatge Realitzar la comanda</i></button>
    </div>
    <div class="col-md-6">
        <h4>Missatge Text informatiu mode de pagament</h4>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>
</div> 

