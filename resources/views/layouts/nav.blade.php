<nav class="navbar navbar-expand-md navbar-dark navbar-laravel elegant-color " style="z-index:1">
    <div class="container white-text">
        <a class="navbar-brand m-0" href="@if(\Auth::guest() || \Auth::user()->isAdmin() == false)
        {{route('accueil')}}
        @else
        {{ route('admin.gestion.utilisateurs') }}
        @endif">
            <div class="logo">
                <h1><span class="icon-toque mr-3"></span>
                    <span class="atable"><span class="titre_first_letter">A  </span>TABLE !</span>
                </h1>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <form class="md-form active-red active-red-2 mb-3 mt-0 form-sm w-100 ml-auto mr-auto px-4"
                  id="navbarSearchForm" action="{{ route('recettes.rechercher.post') }}" method="post">
                @csrf
                <div class="md-form input-group">
                    <input class="form-control" type="text" placeholder="Chercher une recette" name="search"
                           autocomplete="on" value="@if(!empty($search)){{ $search }}@endif">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-sm btn-outline-white m-0"><i class="fa fa-search"></i></button>
                        <button type="button" class="btn btn-sm btn-outline-white m-0 px-3 dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu " style="left:auto; right: 0">
                            <a class="dropdown-item" href="{{ route('recettes.categories') }}">Afficher par catégorie</a>
                        </div>
                    </div>
                </div>


                {{--<i class="fa fa-search" aria-hidden="true"></i>--}}
            </form>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" id="container_nav">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link lien_nav @if(Route::is('login')) active @endif" id="connexion"
                           href="{{ route('login') }}">Connexion</a></li>
                    <li><a class="nav-link lien_nav @if(Route::is('register')) active @endif" id="inscription"
                           href="{{ route('register') }}">Inscription</a>
                    </li>
                @else
                    @if(\Auth::user()->isMembre())
                        <li><a class="nav-link lien_nav @if(Route::is('recettes.ajout*')) active @endif"
                               id="ajout_recette"
                               href="{{ route('recettes.ajout') }}">Ajouter une
                                recette</a></li>
                    @endif
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link lien_nav" id="dropdownMenu4" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Bonjour {{\Auth::user()->pseudo}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu4">

                            @if(\Auth::user()->isMembre())
                                <a class="dropdown-item" href="{{route('profil', ['user' => Auth::user()])}}">Mon
                                    profil</a>
                                <a class="dropdown-item" href="{{route("mes_recettes")}}">Mes recettes</a>
                                <div class="dropdown-divider"></div>
                            @endif

                            <a class="dropdown-item " href="{{ route('logout.post') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout.post') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>


                @endguest
            </ul>
        </div>
    </div>
</nav>
{{--<script>--}}

{{--// Get the container element--}}
{{--var container = document.getElementById("container_nav");--}}

{{--// Get all buttons with class="btn" inside the container--}}
{{--var lien = container.getElementsByClassName("lien_nav");--}}

{{--// Loop through the buttons and add the active class to the current/clicked button--}}
{{--for (var i = 0; i < lien.length; i++) {--}}
{{--lien[i].addEventListener("click", function() {--}}
{{--var current = document.getElementsByClassName("active");--}}
{{--current[0].className = current[0].className.replace(" active", "");--}}
{{--this.className += " active";--}}
{{--});--}}
{{--}--}}
{{--</script>--}}