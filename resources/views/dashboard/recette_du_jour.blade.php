<section class="container elegant-color p-5">
    <!-- Card -->
    <div class="card pr-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-5">
                <!-- Card image -->
                <img class="img-fluid m-0" src="{{asset("storage/".$recette_du_jour->recette->photo)}}">
            </div>
            <div class="col-12 col-md-7">
                <!-- Card content -->
                <div class="card-body p-0">
                    <!-- Title -->
                    <h4 class="card-title pt-2 pb-3 m-0">La recette du jour </h4>
                    <h5 class="titre_recette_jour">{{$recette_du_jour->recette->titre}}</h5>
                    <!-- Text -->
                    <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <!-- Button -->
                    <a href="{{route("consulter_recette.get", ['id' => $recette_du_jour->recette->id])}}"
                       class="btn btn-red darken-3">Lire la suite</a>
                </div>
            </div>
        </div>
    </div>
</section>