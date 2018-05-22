<nav class="navbar navbar-expand-md navbar-dark navbar-laravel elegant-color " style="z-index:1">
    <div class="container white-text">
        <a class="navbar-brand m-0"
           href="@if(\Auth::guest()) {{route('accueil')}}
           @elseif(\Auth::user()->isAdmin()) {{ route('admin.gestion.utilisateurs.get') }}
           @else {{ route('dashboard') }}
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
                  id="navbarSearchForm" action="{{ route('search.post') }}" method="post">
                @csrf
                <input class="form-control w-100" type="text" placeholder="Chercher une recette" name="search"
                       autocomplete="on">
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
                        <li><a class="nav-link lien_nav @if(Route::is('ajout_recette.*')) active @endif"
                               id="ajout_recette"
                               href="{{ route('ajout_recette.get') }}">Ajouter une
                                recette</a></li>
                    @endif
                    <li class="dropdown">
                        <a class="dropdown-toggle nav-link lien_nav" id="dropdownMenu4" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            Bonjour {{\Auth::user()->pseudo}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu4">

                            @if(\Auth::user()->isMembre())
                                <a class="dropdown-item" href="{{route('profil', ['user_id' => Auth::user()->id])}}">Mon
                                    profil</a>
                                <a class="dropdown-item" href="#">Mes recettes</a>
                                <div class="dropdown-divider"></div>
                            @endif

                            <a class="dropdown-item " href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
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