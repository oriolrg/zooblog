<div class="nav-side-menu">
    <div class="brand"><br /></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
          <h3>Menú Administració</h3>
            <ul id="menu-content" class="menu-content collapse out">
                <a href="/administra/categoria">
                  <li  data-toggle="collapse" data-target="#categories" class="categoria">
                    Categories d'animals
                  </li>
                </a>
                <a href="/administra/animal">
                  <li  data-toggle="collapse" data-target="#animals" class="animal">
                    Animals
                  </li>
                </a>
                @isset($dataAnimal)
                <ul class="sub-menu collapse" id="animals">
                
                  <li><a href="#"></a></li>
                
                </ul>
                @endisset
                <a href="/administra/apadrina"> 
                  <li>
                    Apadrina un animal
                  </li>
                </a>
                <a href="/administra/quisom">
                  <li>
                    Qui sóm
                  </li>
                </a>
                <a href="/administra/colaboradors">
                  <li>
                     Col·laboradors
                  </li>
                </a>
                <a href="/administra/peu">
                  <li>
                     Peu de pàgina
                  </li>
                </a>
            </ul>
     </div>
</div>
