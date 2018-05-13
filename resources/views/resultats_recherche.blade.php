@extends('layouts.app')

@section('content')
    <div class="container elegant-color p-5">
        <!-- Card -->
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
                            <h5 class="titre_recette_jour">{{$recette->titre}}</h5>
                            <!-- Text -->
                            <p class="card-text text-left">Consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <!-- Button -->
                            <a href="{{route("consulter_recette.get", ['id' => $recette->id])}}"
                               class="btn btn-red darken-3">Lire la suite</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection