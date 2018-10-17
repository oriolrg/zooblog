@extends('layouts.publicapp')
@section('content')

<!-- Navigation -->
<header class="masthead" style="background-image: url('{{asset('/storage/app/public//')}}/{{$especie->imatge}}');">
  <div class="container">
    <div class="intro-text">
    <!-- TODO text corresponent a la plana on s'està -->
      <div class="intro-heading">{{$especie->title}}</div>
      <!-- TODO insertar descripció  i comentaris -->
      <div class="intro-lead-in">{{$especie->nomcientific}}</div>
    </div>
  </div>
</header>
  <div class="flex">
    <div>
      <div class="container">
        <legend>{{$especie->title}}</legend>
      </div>
      <div class="container">
        <div class="intro-lead-in"><?php echo $especie->description;?></div>
      </div>
    </div>
  </div>
  <div class="flex">
    <div>
      <div class="container items">
        <ul>
          <li>
            Nom científic: {{ $especie->nomcientific }}
          </li>
          <li>
            Ocurrència: {{ $especie->ocurrencia }}
          </li>
          <li>
            Mida: <?php echo $especie->mida;?>
          </li>
          <li>
            Pes:  <?php echo $especie->pes;?>
          </li>
          <li>
            Embaras: {{ $especie->embaras }}
          </li>
          <li>
            Nº de cries: {{ $especie->cries }}
          </li>
          <li>
            Vida: <?php echo $especie->vida;?>
          </li>
          <li>
            Dieta: <?php echo $especie->dieta;?>
          </li>
          <li>
            Estatus de protecció: {{ $especie->proteccio }}
          </li>
        </ul>
      </div>
    </div>
    <div class="w3-content" style="max-width:1200px">
      @foreach($especie->seccions as $key => $seccions)
        <img class="mySlides" src="{{asset('/storage/app/public//')}}/{{$seccions->imatge}}" style="width:100%">
      @endforeach
      <div class="w3-row-padding w3-section">
        <?php $i = 0;?>
        @foreach($especie->seccions as $key => $seccions)
          <?php $i += 1;?>
          @if(strlen($seccions->imatge)>=2)
            <div class="w3-col s3">
              <img class="demo w3-opacity w3-hover-opacity-off" src="{{asset('/storage/app/public//')}}/{{$seccions->imatge}}" style="width:100%" onclick="currentDiv({{$i}})">
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
 <div class="flex">
    <div>
      <?php $cont = 0 ?>
      <article class="text">
        <div class="container">
          @foreach($especie->seccions as $key => $seccions)
            <?php $cont += 1 ?>
            @if(@isset($seccions->imatge))
              <article class="@if($cont %2 == 0) bg-gray @endif">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-6 @if($cont %2 == 0) order-lg-2 @endif">
                      <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{asset('/storage/app/public//')}}/{{$seccions->imatge}}" alt="">
                      </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                      <div class="p-5">
                        <legend>{{$seccions->title}}</legend>
                        <p>
                          {{$seccions->description}}
                        </p>
                        {{$seccions->list}}
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            @else
              <article class="@if($cont %2 == 0) bg-gray @endif">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-12 order-lg-1">
                      <div class="p-5">
                        <legend>{{$seccions->title}}</legend>
                          <p>
                            <?php echo $seccions->description;?>
                          </p>
                          <?php echo $seccions->list;?>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            @endif
          @endforeach
      </article>
    </div>
  </div>

@include('public.apadrina.apadrina')
@include('public.contacta.contacta')
@include('public.footer.footer')
@include('public.politicaPrivacitat.politicaPrivacitat')

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('js/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
  
</script>
@endsection
