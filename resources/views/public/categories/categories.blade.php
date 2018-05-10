<section  id="categories">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Categories d'animals</h2>
      </div>
    </div>
    <div class="row">
      @foreach($data as $key => $categoria)
      @if ($categoria->status === 1)
        <div class="col-md-3 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="{{asset('categoria')}}/{{$categoria->title}}">
            <div class="portfolio-hover">
                <img class="img-fluid" src="{{asset('/storage/app/public//')}}/{{$categoria->imatge}}" alt="">
            </div>
            <img class="rounded-circle img-fluid" src="{{asset('/storage/app/public//')}}/{{$categoria->imatge}}" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>{{ $categoria->title}}</h4>
            <p class="text-muted">{{ $categoria->description}}</p>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</section>
