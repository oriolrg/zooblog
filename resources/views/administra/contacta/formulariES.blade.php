<h2>Castellà</h2>
<label for="link">Missatge d'acceptació contacte</label>
<input type="text" name="missAccepto" id="missAccepto" class="form-control" placeholder="Missatge d'acceptació contacte..." rows="1" value="{{isset($dataContactaES) ? $dataContactaES->missAccepto : ''}}">
<label for="link">Missatge de protecció de dades Contacta</label>
<textarea type="text" name="missProteccio" id="missProteccio" class="form-control" placeholder="Missatge protecció de dades..." rows="4">{{isset($dataContactaES) ? $dataContactaES->missProteccio : ''}}</textarea>
<label for="link">Botó enviar</label>
<input type="text" name="enviar" id="enviar" class="form-control" placeholder="Enviar el missatge..." rows="1" value="{{isset($dataContactaES) ? $dataContactaES->enviar : ''}}">
<button type="submit" class="btn btn-primary" >
   <i class="glyphicon glyphicon-send"> Enviar </i>
</button>
