<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contacta</h2>
        <h3 class="section-subheading text-muted">Telèfon @isset($contacta[0]->telefon) {{$contacta[0]->telefon}} @endisset<br />
          @isset($contacta[0]->direccio) {{$contacta[0]->direccio}} @endisset<br />
          @isset($contacta[0]->email) {{$contacta[0]->email}} @endisset
        </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="contactForm" name="sentMessage" novalidate>
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="name" type="text" placeholder="El teu Nom *" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="email" type="email" placeholder="El teu Email *" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="phone" type="tel" placeholder="El teu telefon *" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" id="message" placeholder="El teu missatge *" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                   <input type="checkbox" name="checkbox" id="option" required  data-validation-required-message="Accepta la politica de privacitat."><label for="option"><span></span> <p class="section-subheading text-muted">Sí, accepto la <a class="portfolio-link" data-toggle="modal" href="#politicaPrivacitat">politica de privacitat</a> de ZooPirineu</p></label>
                   <p class="help-block text-danger"></p>
                 </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envia el missatge</button>
            </div>
          </div>
          <p class="section-subheading text-muted">
               ZooPirineu li informa que les dades de caracter personal que proporcionis omplint el formulari
               serán tractats per Stania Kuspertova (ZooPirineu) com a responsable d'aquesta web. La finalitat de la recollida i tractament de les dades personals que sol·licito són per gestionar la sol·licitut que realizes en aquest formulario de contacte.
               Legitimació: Consentimient de l'interessat.
          </p>
          <p>

          </p>
        </form>
      </div>
    </div>
  </div>
  <!-- recaptcha -->
  <script src='https://www.google.com/recaptcha/api.js'></script>

  <div class="row">
    <div class="col-lg-12 text-center">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2959.326297959138!2d1.496310515448796!3d42.12189737920366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a5c7138a448751%3A0x94a38b73d95dd68c!2sZoo+del+Pirineu!5e0!3m2!1sca!2ses!4v1525707510802" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>
  </div>
</section>
