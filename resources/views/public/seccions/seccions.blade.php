<section id="seccions">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">@isset($administra){{$administra->menu7}}@endisset</h2>
        <!--<h3 class="section-subheading text-muted">Apadrina algun dels nostres animals</h3>-->
      </div>
    </div> 
    <div class="row flex-row">
      @isset($especie->seccions)
        @foreach($especie->seccions as $key => $seccions)
          <div class="col-md-4 col-md chapter-col">
            <p><a class="scroll-click" href="#{{$seccions->title}}"><img class="size-full aligncenter rounded-circle" src="{{asset('/storage/app/public//')}}/{{$seccions->imatge}}" alt="{{$seccions->alt_imatge}}" width="214" height="auto"></a></p>
            <a class="portfolio-link"  href="{{asset('seccions')}}/{{$seccions->title}}">
              <div class="portfolio-caption">
                <h4>{{ $seccions->title}}</h4>
                <p>{!!substr($seccions->description,0,100)!!} <a  class="portfolio-link" href="{{asset('$seccions')}}/{{$seccions->title}}" style="color:green">...</a></p>
              </div>
            </a>
          </div>
        @endforeach
      @endisset
    </div>
  </div>
</section>