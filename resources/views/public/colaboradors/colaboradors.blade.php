<section id="colaboradors">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Col·laboradors</h2>
        <h3 class="section-subheading text-muted"></h3>
      </div>
    </div>
    @foreach($colaboradors as $key => $colaborador)
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <a href="{{$colaborador->link}}">
          <img class="img-fluid d-block mx-auto" src="{{asset('/storage/app/public//')}}/{{$colaborador->imatge}}" alt=""></img>
        </a>
      </div>
    </div>
    @endforeach
  </div>
</section>
