@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="red darken-3 white-text text-center" id="popup_notification">
            {{ session('success') }}
        </div>
    @endif

    <section class="container elegant-color p-5">
        <!-- Card -->
        <div class="card">
            <div class="row align-items-center">
                <div class="col-4">
                    <!-- Card image -->
                    <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}">
                </div>
                <div class="col-8">
                    <!-- Card content -->
                    <div class="card-body px-3">
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

    <section class="container elegant-color p-5">
        <div class="card-deck">
            <div class="card">
                <!--Card image-->
                <div class="view overlay">
                    <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}"
                         alt="Card image cap">
                    <a href="#">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Dernier ajout</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up
                        the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <a href="" type="button" class="btn btn-outline-red darken-3 btn-sm">Lire la suite</a>
                </div>
                <!--Card content-->
                <!--Card-->
            </div>

            <div class="card">
                <!--Card image-->
                <div class="view overlay">
                    <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}"
                         alt="Card image cap">
                    <a href="#">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Dernier ajout</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up
                        the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <a href="" type="button" class="btn btn-outline-red darken-3 btn-sm">Lire la suite</a>
                </div>
                <!--Card content-->
                <!--Card-->
            </div>
            <div class="card">
                <!--Card image-->
                <div class="view overlay">
                    <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}"
                         alt="Card image cap">
                    <a href="#">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>
                <!--Card image-->
                <!--Card content-->
                <div class="card-body">
                    <!--Title-->
                    <h4 class="card-title">Dernier ajout</h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up
                        the bulk of the card's content.</p>
                    <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                    <a href="" type="button" class="btn btn-outline-red darken-3 btn-sm">Lire la suite</a>
                </div>
                <!--Card content-->
                <!--Card-->
            </div>
        </div>
    </section>
@endsection
