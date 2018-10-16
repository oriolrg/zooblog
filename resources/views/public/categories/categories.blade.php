<section  id="categories">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Categories d'animals</h2>
      </div>
    </div>
    <div class="row">
      @foreach($data as $key => $familia)
      @if ($familia->status === 1)
        <div class="col-md-3 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="{{asset('familia')}}/{{$familia->title}}">
            <div class="portfolio-hover">
                <img class="img-fluid" src="{{asset('/storage/app/public//')}}/{{$familia->imatge}}" alt="">
            </div>
            <img class="rounded-circle img-fluid" src="{{asset('/storage/app/public//')}}/{{$familia->imatge}}" alt="">
          </a>
          <div class="portfolio-caption">
            <h4>{{ $familia->title}}</h4>
            <p class="text-muted">{{ $familia->description}}</p>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</section>
