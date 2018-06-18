@extends('layouts.app')

@section('content')
    <div class="container grey lighten-5 h-100">
        <div class="row row_haut_recette">
            <div class="col-1"></div>
            <div class="col-2 elegant-color"></div>
            <div class="col-9">
                <h1 class="titre_recette text-center grey-text py-1">{{ucfirst($recette->titre)}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-1 elegant-color my-3"></div>
            <div class="col-2 elegant-color px-0">
                <img src="{{asset("storage/".$recette->photo)}}" class="img-fluid" alt="">
            </div>
            <div class="col-9 elegant-color infos_recette white-text text-center my-3">
                <div class="row">
                    <div class="col-3">
                        <h3 class="pt-2">Cuisson</h3>
                        <span class="pb-2">{{$recette->temps_cuisson}}</span>
                    </div>
                    <div class="col-3">
                        <h3 class="pt-2">Préparation</h3>
                        <span class="pb-2">{{$recette->temps_preparation}}</span>
                    </div>
                    <div class="col-3">
                        <h3 class="pt-2">Coût</h3>
                        @if($recette->prix=="bon marché")
                            <span class="pb-2 icon-euro"></span>
                        @elseif($recette->prix=="moyen")
                            <span class="pb-2 icon-euro"></span>
                            <span class="pb-2 icon-euro"></span>
                        @else
                            <span class="pb-2 icon-euro"></span>
                            <span class="pb-2 icon-euro"></span>
                            <span class="pb-2 icon-euro"></span>
                        @endif
                    </div>
                    <div class="col-3">
                        <h3 class="pt-2">Difficulté</h3>
                        @if($recette->difficulte=="facile")
                            <span class="pb-2 icon-toque"></span>
                        @elseif($recette->difficulte=="moyen")
                            <span class="pb-2 icon-toque"></span>
                            <span class="pb-2 icon-toque"></span>
                        @else
                            <span class="pb-2 icon-toque"></span>
                            <span class="pb-2 icon-toque"></span>
                            <span class="pb-2 icon-toque"></span>
                        @endif

                    </div>
                </div>
            </div>

        </div>
        <div class="row h-75">
            <div class="col-1"></div>
            <div class="col-2 elegant-color ingredients">
                <p class="white-text text-center py-3">Ingrédients <br>pour {{$recette->nb_pers}} personnes</p>
                <table class="white-text table-responsive table-sm">
                    @foreach( $recette->ingredients()->get() as $ingredient)
                        <tr>
                            <td class="py-1">{{$ingredient->nom}}</td>
                            <td class="text-right py-1 w-50">{{$ingredient->pivot->quantite}} {{$ingredient->pivot->unite}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col-9">
                @if(\Auth::user()->isAdmin() == true || \Auth::user()->id == $recette->auteur()->first()->id)
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route("recettes.etapes.ajout", ['recette' => $recette]) }}" class="btn btn-sm btn-outline-red float-right">Ajouter
                                une étape</a>
                        </div>
                    </div>
                @endif
                @foreach( $recette->etapes()->get() as $etape)
                    <div class="etape row pr-4">
                        <div class="col-2">
                            <h2>{{$etape->titre}}</h2>
                            @if(isset($etape->photo))
                                <img src="{{asset("storage/".$etape->photo)}}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <div class="col-10">
                            <p>{{$etape->description}}</p>
                        </div>
                        <hr>
                    </div>

                @endforeach
                <div class="etape text-center pb-5">
                    <h2>Conseil de présentation</h2>
                    <p>{{$recette->conseil_presentation}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection