@if(count($recettes) == 0)
    <div class="card pr-2 my-3">
        <div class="align-items-center row">
            <div class="col-12">
                <!-- Card content -->
                <div class="card-body p-2 text-center">
                    <p class="card-text">
                        Aucune recette ne correspond à <strong>{{$search}}</strong>
                    <hr>
                    <a href="{{route('accueil')}}" class="btn btn-outline-black">Retour à l'accueil</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@else
    @foreach($recettes as $recette)
        <div class="card pr-2 my-3">
            <div class="align-items-center row">
                <div class="col-12 col-md-5">
                    <!-- Card image -->
                    <img class="img-fluid m-0" src="{{asset("storage/".$recette->photo)}}">
                </div>
                <div class="col-12 col-md-7">
                    <!-- Card content -->
                    <div class="card-body p-0 text-center">
                        <!-- Title -->
                        <h3 class="titre_recette_jour pt-1">{{ucfirst($recette->titre)}}</h3>
                        <!-- Text -->
                        <p class="card-text text-left mb-0">
                            <b>Titre</b>rd
                            <b>Temps de préparation</b>
                            : {{ \Carbon\Carbon::parse($recette->temps_preparation)->format("h\h i\m s\s") }}<br>
                            <b>Temps de cuisson</b>
                            : {{ Carbon\Carbon::parse($recette->temps_cuisson)->format("h\h i\m s\s") }}<br>
                            <b>Difficulté de réalisation</b> : {{ $recette->difficulte }}<br>
                            <b>Prix</b> : {{ $recette->prix }} <br>
                            <b>Nombre de personnes</b> : {{ $recette->nb_pers }} <br>
                            <b>Ajouté par</b> : <span class="red-text">{{ ucfirst($recette->auteur()->first()->pseudo) }}</span>

                        </p>
                        <!-- Button -->
                        <a href="{{route("recettes.consulter", ['recette' => $recette])}}"
                           class="btn btn-red btn-sm darken-3">Consulter la recette</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif