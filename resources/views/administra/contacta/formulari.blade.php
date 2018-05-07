<label for="title">Direcció</label>
<input type="text" name="direccio" id="direccio" class="form-control" placeholder="Direcció..." value="{{isset($editdata) ? $editdata->direccio : ''}}">
<label for="description">Telèfon</label>
<input type="text" name="telefon" id="telefon" class="form-control" placeholder="Telèfon..." value="{{isset($editdata) ? $editdata->telefon : ''}}">
<label for="link">Email</label><!-- TODO controlar que email no sigui null -->
<input type="text" name="email" id="email" class="form-control" placeholder="Email..." rows="1" value="{{isset($editdata) ? $editdata->email : ''}}">
<label for="link">Latitud</label>
<input type="text" name="latitud" id="latitud" class="form-control" placeholder="Latitud..." rows="1" value="{{isset($editdata) ? $editdata->latitud : ''}}">
<label for="link">Longitud</label>
<input type="text" name="longitud" id="longitud" class="form-control" placeholder="Longitud..." rows="1" value="{{isset($editdata) ? $editdata->longitud : ''}}">
<button type="submit" class="btn btn-primary" >
   <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
