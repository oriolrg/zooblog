<section id="animals">
  <div class="mbr-row mbr-justify-content-center">
    @foreach ($animals as $key => $animal)
      <div class="card mbr-col-sm-3 mbr-col-md-12 mbr-col-lg-3">
        <a  class="portfolio-link" href="{{asset('categoria')}}/animal/{{$animal->title}}">
          <div class="card-wrapper">
            <div class="card-img">
              <img src="{{asset('/storage/app/public/')}}/{{$animal->imatge}}" layout="responsive" width="316.5" height="211" alt="Mobirise">
            </div>
            <div class="card-box">
              <h4 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$animal->title}}</h4>
              <h3 class="card-sub-title mbr-fonts-style align-center display-3">{{$animal->nomcientific}}</h3>
              <p class="mbr-text mbr-fonts-style align-center display-7">{{$animal->description}}</p>
            </div>
          </div>
        </a>
      </div>
     @endforeach
  </div>
</section>
