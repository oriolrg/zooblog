<section class="an" id="apadrina">
<div class="row">
         <div class="col-lg-12 text-center">
           <h2 class="section-heading text-uppercase">Apadrina'ns</h2>
           <h3 class="section-subheading text-muted">Apadrina algun dels nostres animals</h3>
         </div>
       </div>
  <div class="mbr-row mbr-justify-content-center">
    @foreach ($apadrina as $key => $animalsapadrinar)
      <div class="card mbr-col-sm-3 mbr-col-md-12 mbr-col-lg-3">
        <a  class="portfolio-link" href="{{asset('apadrina')}}/{{$animalsapadrinar->nom}}">
          <div class="card-wrapper">
            <div class="card-img">
              <img src="{{asset('/storage/app/public/')}}/{{$animalsapadrinar->imatge}}" layout="responsive" width="316.5" height="211" alt="{{$animalsapadrinar->nom}}">
            </div>
            <div class="card-box">
              <h4 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$animalsapadrinar->nom}}</h4>
              <h3 class="card-sub-title mbr-fonts-style align-center display-3">{{$animalsapadrinar->preu}}€</h3>
              <p class="mbr-text mbr-fonts-style align-center display-7">{{$animalsapadrinar->description}}</p>
            </div>
          </div>
        </a>
      </div>
     @endforeach
  </div>
</section>