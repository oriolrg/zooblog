<!-- Contact -->
   <section class="bg-light"  id="animals">
     @if(@isset($animals))
     <!-- TODO mostrar animals aleatoriament-->
            <a href="{{asset('categoria')}}/animal/{{$animals[1]->title}}"><img src="{{asset('public/storage/')}}/{{$animals[rand(0,sizeof($animals)-1)]->imatge}}" width="100%" class="img_thumbnail"></a>
     @endif
   </section>
