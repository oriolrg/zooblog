<!-- Team -->
    <section class="bg-light" id="quisom">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">El nostre equip</h2>
            <h3 class="section-subheading text-muted">Un possible text.</h3>
          </div>
        </div>
        @foreach($quisom as $key => $persona)
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="{{asset('storage/')}}/{{$persona->imatge}}" alt="">
              <h4>{{$persona->nom}}</h4>
              <p class="text-muted">{{$persona->funcions}}</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-facebook"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-linkedin"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        @endforeach

        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <!--<p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>-->
          </div>
        </div>
      </div>
    </section>
