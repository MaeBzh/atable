@extends('admin.admin')

@section('admin_content')
    <div class="container">
        <div class="row titre_dashboard_admin px-2">
            <h2 class="col-10 mt-2">
                Gestion des catégories
            </h2>
            <a class="text-center col-2 btn btn-sm btn-block btn-outline-white text-white hoverable my-2 pb-1 pt-2"
               href="{{route("admin.gestion.categories.ajout")}}">
                Nouvelle catégorie
            </a>
        </div>
    </div>


    <div class="m-3">
        <table class="table my-datatable table-sm text-center">
            <thead class="elegant-color white-text">
            <th>Catégorie</th>
            <th>catégorie parent</th>
            <th>Nombre de sous catégories</th>
            <th>Nombre de recettes</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach(\App\Categorie::all() as $categorie)
                <tr>
                    <td>{{ucfirst($categorie->libelle_categorie)}}</td>
                    <td>
                        @if($categorie->categoriePrincipale()->exists())
                            {{ucfirst($categorie->categoriePrincipale()->first()->libelle_categorie)}}
                        @endif
                    </td>

                    <td>
                        {{ $categorie->sousCategories()->count() }}
                    </td>

                    <td>
                        @php
                            if($categorie->categoriePrincipale()->exists()){
                                $count = $categorie->recettes()->count();
                            } else {
                                $count = 0;
                                foreach ($categorie->sousCategories()->get() as $sous_categorie){
                                    $count += $sous_categorie->recettes()->count();
                                }
                            }
                        @endphp
                        {{ $count }}
                    </td>

                    <td>
                        <form method="POST"

                              action="{{route('admin.gestion.categories.supprimer.post', ["categorie" => $categorie])}}"
                              @if(! $categorie->categoriePrincipale()->exists())
                              onsubmit="return confirm('Supprimer une catégorie principale supprimera toutes les sous-catégories. Poursuivre la suppression ?');"
                                @endif >
                            @csrf
                            <button class="btn btn-sm btn-block btn-outline-grey hoverable my-2" type="submit"
                                @if($count > 0) disabled @endif title="Supprimer">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection