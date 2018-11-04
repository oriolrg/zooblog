<section  id="families">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Families d'animals</h2>
      </div>
    </div>
    <div class="row">
      @foreach($families as $key => $familia)
      @if ($familia->status === 1)
        <div class="col-md-3 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="{{asset('familia')}}/{{$familia->title}}">
            <div class="portfolio-hover">
                <img class="img-fluid" src="{{asset('/storage/app/public//')}}/{{$familia->imatge}}" alt="{{$familia->alt_imatge}}">
            </div>
            <img class="rounded-circle img-fluid" src="{{asset('/storage/app/public//')}}/{{$familia->imatge}}" alt="{{$familia->alt_imatge}}">
          </a>
          <div class="portfolio-caption">
            <h4>{{ $familia->title}}</h4>
            <p class="text-muted">{{substr($familia->description,0,100)}} <a  class="portfolio-link" href="{{asset('familia')}}/{{$familia->title}}" style="color:green">...</a></p>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>
</section>
