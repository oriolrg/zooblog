<section class="an" id="especies">
  <div class="mbr-row mbr-justify-content-center">
    @foreach ($especies as $key => $especie)
      <div class="card mbr-col-sm-3 mbr-col-md-12 mbr-col-lg-3">
        <a  class="portfolio-link" href="{{asset('familia')}}/especie/{{$especie->title}}">
          <div class="card-wrapper">
            <div class="card-img">
              <img src="{{asset('/storage/app/public/')}}/{{$especie->imatge}}" layout="responsive" width="316.5" height="211" alt="{{$especie->title}}" >
            </div>
            <div class="card-box">
              <h4 class="card-title mbr-fonts-style mbr-bold align-center display-5">{{$especie->title}}</h4>
              <h3 class="card-sub-title mbr-fonts-style align-center display-3">{{$especie->nomcientific}}</h3>
              <p class="mbr-text mbr-fonts-style align-center display-7">{{substr($especie->description,0,100)}} <a  class="portfolio-link" href="{{asset('familia')}}/especie/{{$especie->title}}" style="color:green">...</a></p>
            </div>
          </div>
        </a>
      </div>
     @endforeach
  </div>
</section>
