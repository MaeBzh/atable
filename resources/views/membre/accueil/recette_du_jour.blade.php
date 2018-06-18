<section class="container elegant-color p-5">
    <!-- Card -->
    <div class="card pr-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 photo_recette">
                <!-- Card image -->
                <img class="img-fluid m-0" src="{{asset("storage/".$recette_du_jour->recette->photo)}}">
            </div>
            <div class="col-12 col-md-7">
                <!-- Card content -->
                <div class="card-body p-0">
                    <!-- Title -->
                    <h4 class="card-title py-1 m-0">La recette du jour </h4>
                    <div class="card-text">
                        <h5 class="titre_recette">{{ucfirst($recette_du_jour->recette->titre)}}</h5>
                        <h6>Ajoutée par <span class="auteur">{{ucfirst($recette_du_jour->recette->auteur->pseudo)}}</span></h6>
                    </div>
                    <!-- Text -->
                {{--<p class="card-text">Some quick example text to build on the card title and make up--}}
                {{--the bulk of the card's content.</p>--}}
                <!-- Button -->
                    <a href="{{route("recettes.consulter", ['recette' => $recette_du_jour->recette])}}"
                       class="btn btn-red darken-3">Lire la suite</a>
                </div>
            </div>
        </div>
    </div>
</section>