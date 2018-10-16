<div class="nav-side-menu">
    <div class="brand"><br /></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
          <h3>Menú Administració</h3>
            <ul id="menu-content" class="menu-content collapse out">
                <a href="{{asset('/administra/familia')}}">
                  <li  data-toggle="collapse" data-target="#categories" class="familia">
                    Familia d'animals
                  </li>
                </a>
                <a href="{{asset('/administra/especie')}}">
                  <li  data-toggle="collapse" data-target="#animals" class="especie">
                    Espècie
                  </li>
                </a>
                <a href="{{asset('/administra/apadrina')}}">
                  <li>
                    Apadrina un especie(fora de servei)
                  </li>
                </a>
                <a href="{{asset('/administra/quisom')}}">
                  <li   data-toggle="collapse" data-target="#quisom" class="quisom">
                    Qui sóm
                  </li>
                </a>
                <a href="{{asset('/administra/colaboradors')}}">
                  <li  data-toggle="collapse" data-target="#colaboradors" class="colaboradors">
                     Col·laboradors
                  </li>
                </a>
                <a href="{{asset('/administra/contacta')}}">
                  <li  data-toggle="collapse" data-target="#contacta" class="contacta">
                     Contacta
                  </li>
                </a>
            </ul>
     </div>
</div>
