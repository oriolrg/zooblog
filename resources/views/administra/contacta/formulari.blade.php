<h2>Català</h2>
<label for="title">Direcció</label>
<input type="text" name="direccio" id="direccio" class="form-control" placeholder="Direcció..." value="{{isset($dataContacta) ? $dataContacta->direccio : ''}}">
<label for="description">Telèfon</label>
<input type="text" name="telefon" id="telefon" class="form-control" placeholder="Telèfon..." value="{{isset($dataContacta) ? $dataContacta->telefon : ''}}"  maxlength="9">
<label for="link">Email</label><!-- TODO controlar que email no sigui null -->
<input type="text" name="email" id="email" class="form-control" placeholder="Email..." rows="1" value="{{isset($dataContacta) ? $dataContacta->email : ''}}">
<label for="link">Latitud</label>
<input type="text" name="latitud" id="latitud" class="form-control" placeholder="Latitud..." rows="1" value="{{isset($dataContacta) ? $dataContacta->latitud : ''}}">
<label for="link">Longitud</label>
<input type="text" name="longitud" id="longitud" class="form-control" placeholder="Longitud..." rows="1" value="{{isset($dataContacta) ? $dataContacta->longitud : ''}}">
<label for="link">Missatge d'acceptació contacte</label>
<input type="text" name="missAccepto" id="missAccepto" class="form-control" placeholder="Missatge d'acceptació contacte..." rows="1" value="{{isset($dataContacta) ? $dataContacta->missAccepto : ''}}">
<label for="link">Missatge de protecció de dades Contacta</label>
<textarea type="text" name="missProteccio" id="missProteccio" class="form-control" placeholder="Missatge protecció de dades..." rows="4">{{isset($dataContacta) ? $dataContacta->missProteccio : ''}}</textarea>
<label for="link">Botó enviar</label>
<input type="text" name="enviar" id="enviar" class="form-control" placeholder="Enviar el missatge..." rows="1" value="{{isset($dataContacta) ? $dataContacta->enviar : ''}}">
<button type="submit" class="btn btn-primary" >
   <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
