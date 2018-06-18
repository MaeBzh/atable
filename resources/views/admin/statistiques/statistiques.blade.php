@extends('admin.admin')

@section('admin_content')

    <div class="row">
        <div class="col-12">
            <h2 class="titre_dashboard_admin p-2">Statistiques</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <div class="card m-3 text-center">
                <div class="card-header blue darken-3  white-text"># Recettes</div>
                <div class="card-body">{{ \App\Recette::count() }}</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card m-3 text-center">
                <div class="card-header green darken-3  white-text"># Catégories</div>
                <div class="card-body">{{ \App\Categorie::count() }}</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card m-3 text-center">
                <div class="card-header red darken-3 white-text"># Membres</div>
                <div class="card-body">{{ \App\User::count() }}</div>
            </div>
        </div>
        <div class="col-3">
            <div class="card m-3 text-center">
                <div class="card-header orange darken-3 white-text"># Ingrédients</div>
                <div class="card-body">{{ \App\Ingredient::count() }}</div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-6">
            <div class="card m-3">
                <!--Card content-->
                <h5 class="card-header text-center white-text purple darken-3">
                    Sous-catégories populaires
                </h5>

                <div class="card-body">
                    <!-- List group links -->
                    <div class="list-group list-group-flush">
                        @foreach($sous_categories_populaires as $categorie)
                            <a class="list-group-item list-group-item-action waves-effect">{{ ucfirst($categorie->libelle_categorie) }}
                                <span class="badge badge-dark badge-pill pull-right"> {{ $categorie->recettes()->count() }}
                                    @if($categorie->recettes()->count() > 1) recettes @else recette @endif</span>
                            </a>
                        @endforeach
                    </div>
                    <!-- List group links -->

                </div>

            </div>
        </div>

        <div class="col-6">
            <div class="card m-3">
                <!--Card content-->
                <h5 class="card-header text-center white-text pink darken-3">
                    Les dernières recettes ajoutées
                </h5>

                <div class="card-body">
                    <!-- List group links -->
                    <div class="list-group list-group-flush">
                        @foreach($recettes_recentes as $recette)
                            <a class="list-group-item list-group-item-action waves-effect">{{ ucfirst($recette->titre) }}
                                par {{ ucfirst($recette->auteur()->first()->pseudo) }}
                                <span class="badge badge-dark  pull-right"> {{$recette->created_at->format('d/m/Y h:i:s')}} </span>
                            </a>
                        @endforeach
                    </div>
                    <!-- List group links -->

                </div>

            </div>
        </div>
    </div>
@endsection