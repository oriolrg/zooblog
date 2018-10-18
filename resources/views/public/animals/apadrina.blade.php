<section class="an" id="animals">
  <div class="mbr-row mbr-justify-content-center">
    @foreach ($apadrina as $key => $apadrinaAnimal)
      <div class="card mbr-col-sm-3 mbr-col-md-12 mbr-col-lg-3">
        <!--<a  class="portfolio-link" href="{{asset('familia')}}/especie/{{$apadrinaAnimal->title}}">-->
          <div class="card-wrapper">
            <div class="card-img">
              <img src="{{asset('/storage/app/public/')}}/{{$apadrinaAnimal->imatge}}" layout="responsive" width="316.5" height="211" alt="Mobirise">
            </div>
            <div class="card-box">
              <h2 class="card-sub-title mbr-fonts-style align-center display-3">{{$apadrinaAnimal->nom}}</h2>
              <h4 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$apadrinaAnimal->preu}}€</h4>
              
              <p class="mbr-text mbr-fonts-style align-center display-7">{{$apadrinaAnimal->description}}</p>
            </div>
          </div>
        </a>
      </div>
     @endforeach
  </div>
</section>
