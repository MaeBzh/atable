@extends('layouts.app')

@section('content')
    <div class="container elegant-color p-5 h-100">
        <!-- Card -->
        <h2 class="white-text"> Recettes par catégories </h2>
        <hr class="white">
        <div id="resultat_recherche">
            <div class="row">
                <div class="col-4">
                    <div class="card pr-2 my-3">
                        <div class="align-items-center row">
                            <div class="col-12">
                                <!-- Card content -->
                                <div class="card-body p-2 text-center">
                                    <div class="card-text">
                                        <form id="formRecetteCategorieAjax" method="get" action="{{route('recettes.categories.ajax')}}"></form>
                                        <ul class="list-group">
                                            @foreach(\App\Categorie::categoriesPrincipales() as $categorie_principale)
                                                <li class="list-group-item">
                                                    <h2>{{ucfirst($categorie_principale->libelle_categorie)}}</h2>
                                                    <div class="list-group">
                                                        @foreach($categorie_principale->sousCategories()->get() as $sous_categorie)
                                                            <a class="list-group-item waves-effect recette_categorie" data-id="{{$sous_categorie->id}}">
                                                                {{ucfirst($sous_categorie->libelle_categorie)}}
                                                                <span class="badge badge-danger">{{ $sous_categorie->recettes()->count() }}</span>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8" id="resultat_recettes_categorie">
                    <div class="card pr-2 my-3">
                        <div class="align-items-center row">
                            <div class="col-12">
                                <!-- Card content -->
                                <div class="card-body p-2 text-center">
                                    <div class="card-text" >

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection