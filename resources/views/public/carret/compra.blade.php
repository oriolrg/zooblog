<section id="compra" class="color">
  <div class=container>
    <h3 class="align-center">@isset($administra){{$administra->menu3}}@endisset</h3>
    <div class="panel panel-primary">
      <div class="panel-heading">        
        <h6 class="align-center">@isset($plataformaPagament){{$plataformaPagament->miss_fiCompra}}@endisset</h6>
      </div>
      <div class="panel-body">
        <table id="tableCategories" class="table table-striped tablesorter">
          <thead>
            <tr class="success">
              <th><span></span></th>
              <th>Animal<span></span></th>
              <th><span></span></th>
              <th>Preu<span></span></th>
            </tr>
          </thead>
          <tbody>
            <tr class="success" id="{{ $apadrina->id }}">
              <td class="imatge">
                <img src="{{asset('/storage/app/public/')}}/{{$apadrina->imatge}}" width="100px" class="img_thumbnail">
              </td>
              <td class="nom">
                {{ $apadrina->nom}}
                <p>{{ $apadrina->queOfereix}}</p>
              </td>
              <td class="preu">
              </td>
              <td class="preu">
                {{ $apadrina->preu}}€
              </td>
            </tr>
          </tbody>
        </table>
        <form  enctype="multipart/form-data"  action="{{ url('apadrina/compra/plataform/redsys')}}" method="post">
					{{ csrf_field() }}			
          @include('public.carret.formulari.formulari')
				</form>
      
    </div>
  </div>
</section>