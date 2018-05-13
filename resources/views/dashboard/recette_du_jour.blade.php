<section class="container elegant-color p-5">
    <!-- Card -->
    <div class="card">
        <div class="row align-items-center">
            <div class="col-12 col-md-5">
                <!-- Card image -->
                <img class="img-fluid m-0" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}">
            </div>
            <div class="col-12 col-md-7">
                <!-- Card content -->
                <div class="card-body p-0">
                    <!-- Title -->
                    <h4 class="card-title pt-4 pb-3 m-0"><a>La recette du jour</a></h4>
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