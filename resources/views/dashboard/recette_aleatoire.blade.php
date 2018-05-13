<section class="container elegant-color p-5">
    <div class="card-deck recettes_aleatoires">
        @foreach($recettes as $recette)
        <div class="card col-12 col-md-4 my-2 p-0">
            <!--Card image-->
            <img class="img-fluid" src="{{asset("storage/".$recette->photo)}}">
            <!--Card image-->
            <!--Card content-->
            <div class="card-body">
                <!--Title-->
                <h4 class="card-title">{{$recette->titre}}</h4>
                <!--Text-->
                <p class="card-text">Some quick example text to build on the card title and make up
                    the bulk of the card's content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <a href="{{route("consulter_recette.get", ['id' => $recette->id])}}"
                   class="btn btn-outline-red darken-3 btn-sm">Lire la suite</a>
            </div>
            <!--Card content-->
            <!--Card-->
        </div>
        @endforeach

    </div>
</section>