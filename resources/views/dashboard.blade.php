@extends('layouts.app')

@section('content')

    @if (session()->has('success'))
        <div class="red darken-3 white-text text-center" id="popup_notification">
            {{ session('success') }}
        </div>
    @endif
    <section class="container elegant-color h-100 p-5">
        <div class="row">

            <div class="col">
                <div class="card">
                    <div class="row ">
                        <div class="col-md-4">$recette_du_jour->recette->photo
                            <img src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}" class="img-fluid">
                        </div>
                        <div class="col-md-8 px-3">
                            <div class="card-block px-3">
                                <h4 class="card-title pt-4 pb-3 m-0">La recette du jour</h4>
                                <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                <a href="{{route("consulter_recette.get", ['id' => $recette_du_jour->recette->id])}}" class="btn btn-red darken-3">Lire la suite</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{--<div class="w-100 py-3"></div>--}}
        <div class="row">
            {{-- todo foreach $recettes -> $recette --}}
            <div class="col">
                <!--Card group-->
                <div class="card-deck">


                    <!--Card-->
                    <div class="card mb-4">

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
                            <a href="{{route("consulter_recette.get", ['id' => $recette->id])}}" type="button" class="btn btn-outline-red darken-3 btn-sm">Lire la suite</a>
                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card image-->
                        <div class="view overlay">
                            <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}"
                                 alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Card title</h4>

                            <!--Text-->
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>

                            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                            <button type="button" class="btn btn-outline-red darken-3 btn-sm">Lire la suite</button>
                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card image-->
                        <div class="view overlay">
                            <img class="img-fluid" src="{{asset('img/tagliatelles_au_gorgonzola.jpg')}}"
                                 alt="Card image cap">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!--Card image-->

                        <!--Card content-->
                        <div class="card-body">
                            <!--Title-->
                            <h4 class="card-title">Card title</h4>

                            <!--Text-->
                            <p class="card-text">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>

                            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                            <button type="button" class="btn btn-outline-red btn-sm">Lire la suite</button>
                        </div>
                        <!--Card content-->

                    </div>
                    <!--Card-->

                </div>
                <!--Card group-->
            </div>
        </div>
    </section>
@endsection
